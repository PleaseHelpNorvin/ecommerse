@extends('client.layout.layout')
@section('main')
    <div class="wrapper">
        <div>
            <p>your orders</p>
        </div>
        <div class="order-header">
            <div class="order-divider">
                <p>Order Number</p>
            </div>
            <div class="order-divider">
                <p>Ordered Date</p>
            </div>
            <div class="order-divider">
                <p>M.O.P</p>
            </div>
            <div class="order-divider">
                <p>Status</p>
            </div>
            <div class="order-divider">
                <p>Total</p>
            </div>
            <div class="order-divider">
                <p>Action</p>
            </div>
        </div>
        <div class="order-container">
            @forelse ($clientOrders as $clientorder)
                <div class="order-item">
                    {{-- <div class="order-image">
                        <img src="{{asset('roldan.png')}}" alt="">
                    </div> --}}
                    <div class="order-name">
                        <p>{{$clientorder->order_number}}</p>
                    </div>
                    <div class="order-name">
                        <p>{{$clientorder->created_at}}</p>
                    </div>
                    <div class="order-quantity">
                        <p>{{$clientorder->mop}}</p>
                    </div>
                    <div class="order-price">
                        <p>{{$clientorder->status}}</p>
                    </div>
                    <div class="order-color">
                        <p>₱{{ number_format($clientorder->total, 2, '.', ',') }}</p>
                        {{-- <td>₱{{ number_format($clientorder->total, 2, '.', ',') }}</td> --}}

                    </div>
                    <div class="order-action">
                        <a href="{{ route('clientorderlist.view', ['username' => $username, 'order' => $clientorder->order_number]) }}">
                            <span class="material-symbols-outlined">view_list</span>
                        </a>
                        @if($clientorder->status == 'Pending' || $clientorder->status == 'Cancel')
                            <div style="display: block;">
                                <form action="{{ route('order.cancel', ['orderNumber' => $clientorder->order_number]) }}" method="POST">
                                    @csrf
                                    <button type="submit">
                                        <span class="material-symbols-outlined">cancel</span>
                                    </button>
                                </form>
                            </div>
                        @else
                            <div style="display: none;">
                                <form action="{{ route('order.cancel', ['orderNumber' => $clientorder->order_number]) }}" method="POST">
                                    @csrf
                                    <button type="submit">
                                        <span class="material-symbols-outlined">cancel</span>
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            @empty
                <p>Empty Order</p>
            @endforelse
        </div>
    </div>
@endsection