<?php
session_start();
header('Content-Type: application/json');

include_once '../config/database.php';

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Not authenticated']);
    exit();
}

$database = new Database();
$db = $database->getConnection();

$input = json_decode(file_get_contents('php://input'), true);
$method = $_SERVER['REQUEST_METHOD'];

switch($method) {
    case 'GET':
        // Get cart items
        $query = "SELECT c.*, p.name, p.price, p.image_url 
                  FROM cart c 
                  JOIN products p ON c.product_id = p.id 
                  WHERE c.user_id = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$_SESSION['user_id']]);
        $cart = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $total_items = array_sum(array_column($cart, 'quantity'));
        
        echo json_encode(['success' => true, 'cart' => $cart, 'total_items' => $total_items]);
        break;
        
    case 'POST':
        // Add to cart
        $product_id = $input['product_id'] ?? null;
        $quantity = $input['quantity'] ?? 1;
        
        if (!$product_id) {
            echo json_encode(['success' => false, 'message' => 'Product ID required']);
            exit();
        }
        
        // Check if item already in cart
        $query = "SELECT * FROM cart WHERE user_id = ? AND product_id = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$_SESSION['user_id'], $product_id]);
        $existing = $stmt->fetch();
        
        if ($existing) {
            // Update quantity
            $query = "UPDATE cart SET quantity = quantity + ? WHERE user_id = ? AND product_id = ?";
            $stmt = $db->prepare($query);
            $stmt->execute([$quantity, $_SESSION['user_id'], $product_id]);
        } else {
            // Add new item
            $query = "INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, ?)";
            $stmt = $db->prepare($query);
            $stmt->execute([$_SESSION['user_id'], $product_id, $quantity]);
        }
        
        // Get updated cart count
        $query = "SELECT SUM(quantity) as total FROM cart WHERE user_id = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$_SESSION['user_id']]);
        $result = $stmt->fetch();
        
        echo json_encode(['success' => true, 'message' => 'Product added to cart', 'cart_count' => $result['total'] ?? 0]);
        break;
        
    case 'PUT':
        // Update quantity
        $product_id = $input['product_id'] ?? null;
        $change = $input['quantity_change'] ?? 0;
        
        if (!$product_id) {
            echo json_encode(['success' => false, 'message' => 'Product ID required']);
            exit();
        }
        
        $query = "UPDATE cart SET quantity = quantity + ? WHERE user_id = ? AND product_id = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$change, $_SESSION['user_id'], $product_id]);
        
        echo json_encode(['success' => true, 'message' => 'Cart updated']);
        break;
        
    case 'DELETE':
        // Remove from cart
        $product_id = $input['product_id'] ?? null;
        
        if (!$product_id) {
            echo json_encode(['success' => false, 'message' => 'Product ID required']);
            exit();
        }
        
        $query = "DELETE FROM cart WHERE user_id = ? AND product_id = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$_SESSION['user_id'], $product_id]);
        
        echo json_encode(['success' => true, 'message' => 'Product removed from cart']);
        break;
}
?>