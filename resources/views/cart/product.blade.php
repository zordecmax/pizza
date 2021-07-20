<div class="row border-top border-bottom">
    <div class="row main align-items-center">
        <div class="col-2"><img class="img-fluid" src="/images/products/pizza1.jpg"></div>
        <div class="col">
            <div class="row">{{$item['item']->name}}</div>
        </div>
        <div class="col">
            <form class="d-flex" action="{{route('cart.update', ['id' => $item['item']->id])}}" method="POST">
                @csrf
                <button class="btn" type="submit" onclick="minusQty(this.parentNode.querySelector('input[type=number]'))">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="red" class="bi bi-dash-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7z"/>
                    </svg>
                </button>
                {{--                           <a href="#" class="border">{{$item['qty']}}</a>--}}
                <input style="width: 30px" class="quantity" min="1" name="qty" value="{{$item['qty']}}" type="number">
                <button class="btn" type="submit" onclick="plusQty(this.parentNode.querySelector('input[type=number]'))">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="red" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                    </svg>
                </button>
            </form>
        </div>
        <div class="col">
            <div>
                                   <span>
                                       {{$item['item']->price}} Mdl
                                   </span>

                <form class="deleteItem" action="{{route('cart.delete', ['id' => $item['item']->id])}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="red" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                        </svg>
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>
