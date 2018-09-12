new Vue({
    el:'#formList',
    data:{
        userName:'',
        password:'',
    },
    methods:{
        checkInput:function () {
            var userName=this.userName;
            var password=this.password;
            if(userName==''||password==''){
                alert("账号或密码为空");
                return;
            }
            if(password.length<6){
                alert("密码不能少于6位");
                return;
            }
            $.ajax({
                url:'login.php',
                type:'get',
                dataType:'json',
                data:{
                    name:userName,
                    password:password,
                },
                success:function (data) {
                    if(data==1){
                        alert("登录成功");
                    }
                    else {
                        alert("用户名或密码错误");
                    }
                },
                error:function (data) {
                    alert(data);
                }

            })

        },
    }
})