<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css')}}" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            margin-top: 40px;
            background: #dde1e7;
        }
        .form-container{
            background: #dde1e7;
    box-shadow: -3px -3px 7px #ffffff73,
              2px 2px 5px rgba(94, 104, 121, 0.288);
    font-family: 'Titillium Web', sans-serif;
    padding: 25px 10px;
    overflow: hidden;
    position: relative;
    z-index: 1;
}
.form-container:before{
    content: '';
    background: radial-gradient(at 50% 25%,#1093ea 0%, #007bb7 100%);
    height: 70%;
    width: 100%;
    position: absolute;
    left: 0;
    top: 0;
    z-index: -1;
    clip-path: polygon(0 0, 100% 0%, 100% 100%, 0 75%);
}
.form-container .form-icon{
    color: #fff;
    font-size: 55px;
    line-height: 55px;
    text-align:  center;
    margin: 0 0 10px;
}
.form-container .title{
    color: #fff;
    font-size: 33px;
    font-weight: 500;
    text-align: center;
    text-transform: capitalize;
    letter-spacing: 0.5px;
    margin: 0 0 25px;
}
.form-container .form-horizontal{
    background: #dde1e7;
    padding: 10px;
    margin: 0 0 20px;
    box-shadow: 0 0 7px rgba(0,0,0,0.3);
    border-radius: 3px;
}
.form-horizontal .form-group{
    background: #ffffff;
    
    margin: 0 0 15px;
    border-radius: 3px;
    border-bottom: 1px solid #ddd;
}
.form-horizontal .form-group:nth-child(3){ margin-bottom: 40px; }
.form-horizontal .input-icon{
    color: #007bb7;
    font-size: 22px;
    text-align: center;
    line-height: 43px;
    height: 45px;
    width: 25px;
    margin: 0 0 0 4px;
    vertical-align: top;
    display: inline-block;
}
.form-horizontal .form-control{
    color: #555;
    background-color: transparent;
    font-size: 20px;
    letter-spacing: 1px;
    width: calc(100% - 33px);
    height: 45px;
    padding: 0 5px;
    box-shadow: none;
    border: none;
    border-radius: 0;
    display: inline-block;
    transition: all 0.3s;
}
.form-horizontal .form-control:focus{
    box-shadow: none;
    border: none;
}
.form-horizontal .form-control::placeholder{
    color: #999;
    font-size: 20px;
    font-weight: 300;
    text-transform: capitalize;
}
.form-horizontal .forgot-pass{
    font-size: 18px;
    font-weight: 500;
    text-align: center;
    margin: 0 0 15px 0;
    display: block;
}
.form-horizontal .forgot-pass a{
    color: #007bb7;
    transition: all 0.3s ease 0s;
}
.form-horizontal .forgot-pass a:hover{ color: #555; }
.form-horizontal .btn{
    color: #fff;
    background: #007bb7;
    box-shadow: -3px -3px 7px #ffffff73,
              2px 2px 5px rgba(94, 104, 121, 0.288);
    font-size: 20px;
    font-weight: 600;
    text-transform: capitalize;
    letter-spacing: 1px;
    width: 100%;
    padding: 5px 15px 5px;
    margin: 0;
    border: none;
    border-radius: 3px;
    transition: all 0.3s ease;
}
 
.form-container .user-signup{
    color: #333;
    font-size: 16px;
    font-weight: 600;
    text-align: center;
    display: block;
}
.form-container .user-signup a{
    color: #007bb7;
    transition: all 0.3s ease 0s;
}
.form-container .user-signup a:hover{
    color: #555;
    text-shadow: 0 0 1px rgba(0,0,0,0.5);
}
     @media screen and (max-width: 970px) {

body{
    margin-left: 130px;
    margin-right: 130px;
   
}

}
            @media screen and (max-width: 600px) {

body{
    margin-left: 0px;
    margin-right: 0px;
}

}
    </style>


<body>
   

    <div class="form-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6">
                    <div class="form-container">
                        <div class="form-icon">
                            <i class="fa fa-user-edit"></i>
                        </div>
                        <h3 class="title">User Login</h3>
                        <form action="{{route('user.login.index')}}" method="post" class="form-horizontal">
                        @csrf
                            <div class="form-group">
                                <span class="input-icon"><i class="fa fa-user"></i></span>
                                <input class="form-control" type="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <span class="input-icon"><i class="fa fa-lock"></i></span>
                                <input class="form-control" type="password" placeholder="Password">
                            </div>
                            {{-- <span class="forgot-pass"><a href="#">Forgot Password ?</a></span> --}}
                            <input type="submit" class="btn btn-primary signin" value="Login">
                        </form>
                        <span class="user-signup">Don't Have an Account? <a href="#">Create Now !</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

