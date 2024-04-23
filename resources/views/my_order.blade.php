@include('layout.header')
<section class="myorder mt-5" id="myorder">
    <div class="container">
        <h1 class="fw-bold display-2 text-center" style="color: #d7bd94">My Order</h1>
        @if ($orders->count() > 0)
        <table>
            <thead>
                <tr>
                    <td>Orders</td>
                    <td>Date Purchased</td>
                    <td>Status</td>
                    <td>Total</td>
                    <td>Payment</td>
                </tr>
            </thead>

            <tbody>
                @if ($orders->isNotEmpty())
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d M, Y') }}</td>
                            <td>
                                @if ($order->status == 'pending')
                                    <span class="status pending">Pending</span>
                                @elseif ($order->status == 'inprogress')
                                    <span class="status inProgress">InProgress</span>
                                @elseif ($order->status == 'delivered')
                                    <span class="status delivered">Delivered</span>
                                @else
                                    <span class="status canceled">Canceled</span>
                                @endif
                            </td>
                            <td>Rp. {{ number_format($order->subtotal) }}</td>
                            <td>
                                @if ($order->metode == 'transfer')
                                    @if ($order->payment_status == 'not paid')
                                        @if ($order->status == 'pending')
                                            <button type="button" class="btn btn-success btn-just-icon btn-sm edit-btn" data-orderid="{{ $order->id }}">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        @else
                                        Canceled
                                        @endif
                                    @else
                                    paid
                                    @endif
                                @else
                                cod
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        @else
        <div class="col-md-12">
            <div class="card" style="background-color: #d7bd94">
                <div class="card-body d-flex justify-content-center" >
                    <h4>Your Order is Empty!</h4>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{config('midtrans.client_key')}}"></script>
<script type="text/javascript">
   $(document).ready(function() {
    $(".edit-btn").click(function(event) {
        event.preventDefault();
        var orderId = $(this).data('orderid'); // Ambil ID pesanan
        // Mendapatkan CSRF token dari meta tag
        var token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: '{{ route("processCheckoutTransfer") }}',
            type: 'post',
            data: {
                _token: token,
                order_id: orderId
            },
            dataType: 'json',
            success: function(response) {
                var snapToken = response.snapToken;
                if (snapToken) {
                    window.snap.pay(snapToken, {
                        onSuccess: function(result) {
                            alert("payment success!");
                            // Mengirim permintaan untuk memperbarui status pembayaran
                            $.ajax({
                                url: '{{ route("updatePaymentStatus") }}',
                                type: 'post',
                                data: {
                                    _token: token,
                                    order_id: orderId // Menggunakan ID pesanan yang sesuai
                                },
                                dataType: 'json',
                                success: function(response) {
                                    // Handle response jika diperlukan
                                },
                                error: function(xhr, status, error) {
                                    console.error(xhr.responseText);
                                    alert("An error occurred while updating payment status.");
                                }
                            });
                            window.location.href = '{{route("myorder")}}';
                        },
                        onPending: function(result) {
                            alert("waiting your payment!");
                            window.location.href = '{{route("myorder")}}';
                        },
                        onError: function(result) {
                            alert("payment failed!");
                            console.log(result);
                        },
                        onClose: function() {
                            alert('you closed the popup without finishing the payment');
                            window.location.href = '{{route("myorder")}}';
                        }
                    });
                } else {
                    alert("Snap token not found!");
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert("An error occurred while processing your request. Please try again later.");
            }
        });
    });
});


</script>

