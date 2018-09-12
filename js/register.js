new Vue({
    el:'#formList',
    data:{
        userName:'',
        password:'',
        confirmPass:'',

    },
    mounted:function () {
        this.$nextTick(function () {

        })
    },
    methods:{
        checkInput:function () {
           var username=this.userName;
           var password=this.password;
           var confirmPass=this.confirmPass;
          if(username==' '| password=='' | confirmPass==''){
              alert("用户名和密码不能为空！");
              return;
          }
          if(password!=confirmPass)
          {
              alert("密码和确认密码不一致！");
              return;
          }else {
              if(confirmPass.length<6)
              {
                  alert("密码不得少于6位");
                  return;
              }
          }
          $.ajax({
              url:'register.php',
              type:'get',
              dataType:'json',
              data:{
                  name:username,
                  password:password,
                  confirmPass:confirmPass,
              },
              success:function (data) {
                  if(data=0)
                      alert("该用户名已经注册");
                 if(data=1)
                     {
                      alert("注册成功");
                  }
                  if(data=2){
                      alert("注册失败");
                  }
              },
              error:function (data) {
                  alert(data);
              }
          })
        },

    }
})