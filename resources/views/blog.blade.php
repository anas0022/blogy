<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<style media="screen">
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            color:white;
        }
        body {
            background-color: #080710;
            font-family: 'Poppins', sans-serif;
            
        }
        .background {
            width: 430px;
            height: 520px;
            position: absolute;
            transform: translate(-50%, -50%);
            left: 50%;
            top: 50%;
        }
        .background .shape {
            height: 200px;
            width: 200px;
            position: absolute;
            border-radius: 50%;
        }
        .shape:first-child {
            background: linear-gradient(#1845ad, #23a2f6);
            left: -80px;
            top: -80px;
        }
        .shape:last-child {
            background: linear-gradient(to right, #ff512f, #f09819);
            right: -30px;
            bottom: -80px;
        }
        
        #promt {
           
            height: 450px; 
          
            height: 520px;
            width: 400px;
            background-color: rgba(255, 255, 255, 0.13);
           width:50%;
        position:absolute;
        left:50%;
        top:50%;
    transform:translate(-50%,-50%);
    border-radius: 10px;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
            padding: 50px 35px;
        }
      #promt * {
            font-family: 'Poppins', sans-serif;
            color: #ffffff;
            letter-spacing: 0.5px;
            outline: none;
            border: none;
        }
        #promt textarea {
            text-align:start;
            width: 50%;
            height: 60%;
            padding: 0 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
            position:absolute;
            top:50%;
            left:50%;
            transform:translate(-50%,-50%);
            color: #080710;
            margin-top:10px;
         
        }
       
        #promt input {
            text-align:start;
            width: 50%;
            height: 10%;
     
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
            position:absolute;
        
            left:50%;
            transform:translate(-50%);
            color: #080710;
        }
        #promt.active {
           display:block;
        }
        #promt button{
            width:100px;
            height: 40px;
            background-color: #ffffff;
            color: #080710;
            font-size:20px;
            position:absolute;
            top:90%;
            left:50%;
            transform:translate(-50%,-50%);
            cursor: pointer;
        }
        .msg{
            height:60px;
            width:100%;
            display:flex;
            justify-content:center;
         

        }
    </style>
     <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
     @error('head')
        <div class="msg">{{ $message }}</div>
    @enderror
    <form id="promt" action="{{ route('blog.post') }}" method="post">
   
    @error('blog')
        <div class="msg">{{ $message }}</div>
    @enderror
    @csrf
    <input type="text" name="head" placeholder="caption" value="{{ old('head') }}" required>
  
    <textarea name="blog" placeholder="blog" required>{{ old('blog') }}</textarea>
 
    <button type="submit">Submit</button>
</form>

</body>
</html>