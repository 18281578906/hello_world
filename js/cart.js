new Vue({
    el:'#shop',
    data:{

    },
    filters:{

    },
    mounted:function () {
      this.$nextTick(function () {

      })
    },
    methods:{
        addAddress:function () {
           $("textarea").css('display','block');
           $("textarea").blur(function () {
               $value=$("textarea").val();
               if($value==''){
                   alert("添加地址失败");
                   $("textarea").css('display','none');
               }else{
                   $.ajax({
                       
                   })
               }
           })
        }
    }
})