@extends('dashboard')

@section('content')
<link href="{{ asset('css/order.css') }}" rel="stylesheet">
<style>
    /* order.css */

/* Biến màu chính */
:root {
    --primary-color: #3490dc;
    --secondary-color: #2779bd;
    --success-color: #38c172;
    --warning-color: #ffed4a;
    --danger-color: #e3342f;
    --dark-color: #343a40;
    --light-color: #f8fafc;
    --gray-color: #6c757d;
    --border-color: #e9ecef;
    --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    --border-radius: 8px;
}

/* Container chính */
.order-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
    background-color: var(--light-color);
    border-radius: var(--border-radius);
    box-shadow: var(--shadow);
}

/* Header & User Info Styling */
.order-header {
    margin-bottom: 25px;
    padding-bottom: 15px;
    border-bottom: 2px solid var(--border-color);
}

.order-header h1 {
    color: var(--primary-color);
    font-size: 28px;
    font-weight: 700;
    margin-bottom: 10px;
}

.user-info {
    background-color: white;
    padding: 15px;
    border-radius: var(--border-radius);
    box-shadow: var(--shadow);
    margin-top: 15px;
}

.user-info h2 {
    font-size: 18px;
    color: var(--dark-color);
    margin-bottom: 5px;
}

.user-info h2 span {
    color: var(--primary-color);
    font-weight: 600;
}

.user-info p {
    color: var(--gray-color);
    font-size: 14px;
}

/* Order Summary & Details Sections */
.order-summary, .order-details {
    background-color: white;
    border-radius: var(--border-radius);
    box-shadow: var(--shadow);
    margin-bottom: 25px;
    overflow: hidden;
}

.order-summary h3, .order-details h3 {
    background-color: var(--primary-color);
    color: white;
    padding: 15px;
    margin: 0;
    font-size: 18px;
    font-weight: 600;
}

/* Table Styling */
.table-responsive {
    overflow-x: auto;
    padding: 15px;
}

.order-table, .detail-table {
    width: 100%;
    border-collapse: collapse;
}

.order-table th, .detail-table th {
    background-color: #f8f9fa;
    color: var(--dark-color);
    font-weight: 600;
    text-align: left;
    padding: 12px 15px;
    border-bottom: 2px solid var(--border-color);
}

.order-table td, .detail-table td {
    padding: 12px 15px;
    border-bottom: 1px solid var(--border-color);
    vertical-align: middle;
}

.order-table tr:hover, .detail-table tr:hover {
    background-color: #f5f7fa;
}

/* Product Info */
.product-info {
    display: flex;
    align-items: center;
}

.product-name {
    font-weight: 500;
    color: var(--dark-color);
}

/* Warning for Amount */
.amount-warning {
    display: inline-block;
    margin-left: 5px;
    color: var(--danger-color);
    background-color: #fff3cd;
    border-radius: 50%;
    width: 18px;
    height: 18px;
    text-align: center;
    line-height: 18px;
    font-weight: bold;
    cursor: help;
}

/* Empty State */
.no-orders {
    text-align: center;
    padding: 30px;
    color: var(--gray-color);
    font-style: italic;
}

/* Notes Styling */
.notes {
    font-style: italic;
    color: var(--gray-color);
    max-width: 200px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .order-container {
        padding: 15px 10px;
    }
    
    .order-header h1 {
        font-size: 24px;
        text-align: center;
    }
    
    .user-info {
        text-align: center;
    }
    
    .table-responsive {
        margin: 0 -10px;
    }
    
    .order-table td, .detail-table td,
    .order-table th, .detail-table th {
        padding: 10px 8px;
        font-size: 14px;
    }
}

/* Button styles (if needed for actions) */
.btn {
    display: inline-block;
    padding: 8px 15px;
    background-color: var(--primary-color);
    color: white;
    border-radius: 4px;
    border: none;
    cursor: pointer;
    font-size: 14px;
    transition: all 0.3s ease;
    text-decoration: none;  /* Remove underline if it's an <a> tag */
}

.btn:hover {
    background-color: var(--secondary-color);
}

.btn-sm {
    padding: 5px 10px;
    font-size: 12px;
}

/* Status badges (if needed) */
.badge {
    display: inline-block;
    padding: 3px 8px;
    border-radius: 4px;
    font-size: 12px;
    font-weight: 600;
}

.badge-success {
    background-color: #d4edda;
    color: var(--success-color);
}

.badge-warning {
    background-color: #fff3cd;
    color: #856404;
}

.badge-danger {
    background-color: #f8d7da;
    color: var(--danger-color);
}

/* Pagination styles (if needed) */
.pagination {
    display: flex;
    justify-content: center;
    margin-top: 20px;
    list-style: none;
    padding: 0;
}

.pagination li {
    margin: 0 5px;
}

.pagination a {
    display: block;
    padding: 8px 12px;
    border: 1px solid var(--border-color);
    border-radius: 4px;
    color: var(--primary-color);
    text-decoration: none;
    transition: all 0.3s;
}

.pagination a:hover,
.pagination .active a {
    background-color: var(--primary-color);
    color: white;
}
</style>
<main class="order-container">
    <div class="order-header">
        <h1>Order Management</h1>
        <div class="user-info">
            <h2>User: <span>{{ $user->name }}</span></h2>
            <p>User ID: {{ $user->id }} | Email: {{ $user->email }}</p>
        </div>
    </div>

    <div class="order-summary">
        <h3>Order Summary</h3>
        <div class="table-responsive">
            <table class="order-table">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Total Amount</th>
                        <th>Address</th>
                        <th>Order Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                    <tr>
                        <td>#{{ $order->id }}</td>

                        <td>
                            {{ number_format($order->calculated_total) }} đ
                            @if($order->total_amount != $order->calculated_total)
                            <span class="amount-warning" title="Tổng tiền không khớp với chi tiết đơn hàng">
                                (!)
                            </span>
                            @endif
                        </td>

                        <td>{{ $order->address }}</td>
                        <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="no-orders">No orders found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @if($orders->count() > 0)
    <div class="order-details">
        <h3>Order Details</h3>
        <div class="table-responsive">
            <table class="detail-table">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Subtotal</th>
                        <th>Notes</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    @foreach($order->orderDetails as $detail)
                    <tr>
                        <td>#{{ $order->id }}</td>
                        <td>
                            <div class="product-info">
                                <span class="product-name">{{ $detail->product->name }}</span>
                            </div>
                        </td>
                        <td>{{ $detail->quantity }}</td>
                        <td>{{ number_format($detail->product->price) }} đ</td>
                        <td>{{ number_format($detail->quantity * $detail->product->price) }} đ</td>
                        <td class="notes">{{ $detail->notes ?? 'N/A' }}</td>
                    </tr>
                    @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
</main>
@endsection