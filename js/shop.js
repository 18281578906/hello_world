$(function () {

    $(".food-book").click(function () {
        $id=this.value;
        $.ajax({
            url:'php/cart2.php',
            type:'get',
            dataType:'json',
            data:{
                id:$id,
            },
            success:function (data) {
               if(data==1)
               {
                   alert('预定成功！');
               }
               else {
                   alert('再次预定成功!');
               }
            },
            error:function (data) {
                alert('error');
            },

        })

    })
})