<script>
    $('.carousel').carousel({
        interval: 200

    })
</script>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v7.0">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.0/owl.carousel.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
    <script src="/assets/js/script.min.js?h=3e13054def8538024443143f80760712"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-ui.min.js"></script>
    <script src="assets/js/jquery.countdown.min.js"></script>
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <script src="assets/js/jquery.zoom.min.js"></script>
    <script src="assets/js/jquery.dd.min.js"></script>
    <script src="assets/js/jquery.slicknav.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.appear.js"></script>
    <script type="text/javascript" src="js/smooth-scroll.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- wow animation -->
    <script type="text/javascript" src="js/wow.min.js"></script>
    <!-- owl carousel -->
    <script type="text/javascript" src="js/owl.carousel.min.js"></script>
    <!-- images loaded -->
    <script type="text/javascript" src="js/imagesloaded.pkgd.min.js"></script>
    <!-- isotope -->
    <script type="text/javascript" src="js/jquery.isotope.min.js"></script>
    <!-- magnific popup -->
    <script
      type="text/javascript"
      src="js/jquery.magnific-popup.min.js"
    ></script>
    <!-- navigation -->
    <script type="text/javascript" src="js/jquery.nav.js"></script>
    <!-- equalize -->
    <script type="text/javascript" src="js/equalize.min.js"></script>
    <!-- fit videos -->
    <script type="text/javascript" src="js/jquery.fitvids.js"></script>
    <!-- number counter -->
    <script type="text/javascript" src="js/jquery.countTo.js"></script>
    <!-- time counter  -->
    <script type="text/javascript" src="js/counter.js"></script>
    <!-- twitter Fetcher  -->
    <script type="text/javascript" src="js/twitterFetcher_min.js"></script>
    <!-- main -->
    <script type="text/javascript" src="js/main.js"></script>

    <script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.0/owl.carousel.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
    <script src="/assets/js/script.min.js?h=89aa604838e2ef00a13dc70c98ae4893"></script>
    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

         {{-- event in homepage --}}
    <script>
        {{-- add item on cart --}}
        function AddCart(id){
            $.ajax({
                url: 'Add-Cart/'+id,
                method: 'GET',
                dataType: "html"
            }).done(function(response){
                RenderCart(response);
                alertify.success('Đã thêm vào giỏ hàng');
            });
        }
        {{-- delete item on cart --}}
        $("#change-item-cart").on("click", ".si-close i", function(){
            $.ajax({
                url: 'Delete-Item-Cart/'+$(this).data("id"),
                method: 'GET',
                dataType: "html"
            }).done(function(response){
                RenderCart(response);
                alertify.success('Đã xóa sản phẩm thành công');
            });
        });

        function RenderCart(response){
            $("#change-item-cart").empty();
            $("#change-item-cart").html(response);
            $("#total-quanty-show").text($("#total-quanty-cart").val())
        }
    </script>

     {{-- event in list cart --}}
<script>

    {{-- delete item in list cart --}}
    function DeleteListItemCart(id){
        $.ajax({
            url: 'Delete-Item-List-Cart/'+id,
            method: 'GET',
            dataType: "html"
        }).done(function(response){
            RenderListCart(response);
            alertify.success('Đã xóa sản phẩm khỏi giỏ hàng');
        });
    }

    function RenderListCart(response){
        $("#list-cart").empty();
        $("#list-cart").html(response);

        var proQty = $('.pro-qty');
        proQty.prepend('<span class="dec qtybtn">-</span>');
        proQty.append('<span class="inc qtybtn">+</span>');
        proQty.on('click', '.qtybtn', function () {
            var $button = $(this);
            var oldValue = $button.parent().find('input').val();
            if ($button.hasClass('inc')) {
                var newVal = parseFloat(oldValue) + 1;
            } else {
                // Don't allow decrementing below zero
                if (oldValue > 0) {
                    var newVal = parseFloat(oldValue) - 1;
                } else {
                    newVal = 0;
                }
            }
            $button.parent().find('input').val(newVal);
        });
    }

    {{-- save item in list cart --}}
    function SaveListItemCart(id){

        $.ajax({
            url: 'Save-Item-List-Cart/' + id + '/' + $("#quanty-item"+id).val(), // giá trị của số lượng đã thay đổi
            method: 'GET',
            dataType: "html"
        }).done(function(response){
            RenderListCart(response);
            alertify.success('Đã cập nhật thành công sản phẩm');
        });
    }

    {{-- save all item in list cart with jquery --}}
    $(".edit-all").on("click", function(){
        var lists = [];
        $("table tbody tr td").each(function(){
            $(this).find("input").each(function(){
                var element = { key : $(this).data("id"), value: $(this).val() } // lay key va value cho phan tu can luu
                lists.push(element);
            });
        });

        $.ajax({
            url: 'Save-All', // giá trị của số lượng đã thay đổi
            method: 'POST',
            dataType: "html",
            data: {
                "_token": "{{csrf_token()}}",
                "data": lists
            }
        }).done(function(response){
            alertify.success('Đã cập nhật giỏ hàng');
            location.reload();
        });
    });

    {{-- delete all item in list cart with jquery --}}
    $(".del-all").on("click", function(){
        var lists = [];
        $("table tbody tr td").each(function(){
            $(this).find("input").each(function(){
                var element = { key : $(this).data("id"), value: $(this).val() } // lay key va value cho phan tu can luu
                lists.push(element);
            });
        });

        $.ajax({
            url: 'Delete-All', // giá trị của số lượng đã thay đổi
            method: 'POST',
            dataType: "html",
            data: {
                "_token": "{{csrf_token()}}",
                "data": lists
            }
        }).done(function(response){
            alertify.success('Đã xóa giỏ hàng');
            location.reload();
        });
    });
</script>


{{-- event with check-out --}}

