<!DOCTYPE html>
<html>

<head>
    <title>Loader Livelo</title>
    <style>
    #livelo-spinner{
    position:fixed;
    width:100%;
    height:100%;
    left:0;
    top:0;
    background:rgba(0,0,0,0.45);
    z-index:1100;
    display:none
}
#livelo-spinner .loader{
    position:absolute;
    top:50%;
    left:50%;
    width:120px;
    height:120px;
    border-radius:50%;
    -webkit-perspective:800px;
    perspective:800px;
    -webkit-transform:translate(-50%, -50%) rotate(25deg);
    transform:translate(-50%, -50%) rotate(25deg)
}
#livelo-spinner .loader::before{
    content:"";
    position:absolute;
    left:50%;
    top:50%;
    -webkit-transform:translate(-50%, -50%) rotate(-25deg);
    transform:translate(-50%, -50%) rotate(-25deg);
    width:120px;
    height:100%;
    background: url("livelo-new-logo.svg") center center no-repeat;
    background-size:contain
}
#livelo-spinner .inner{
    position:absolute;
    -webkit-box-sizing:border-box;
    box-sizing:border-box;
    width:100%;
    height:100%;
    border-radius:50%
}
#livelo-spinner .inner.one{
    left:0;
    top:0;
    -webkit-animation:rotate-one 1s linear infinite;
    animation:rotate-one 1s linear infinite;
    border-bottom:3px solid #ff0a8c
}
#livelo-spinner .inner.two{
    right:0;
    top:0;
    -webkit-animation:rotate-two 1s linear infinite;
    animation:rotate-two 1s linear infinite;
    border-right:3px solid #ff0a8c
}
#livelo-spinner .inner.three{
    right:0;
    bottom:0;
    -webkit-animation:rotate-three 1s linear infinite;
    animation:rotate-three 1s linear infinite;
    border-top:3px solid #ff0a8c
}
@-webkit-keyframes rotate-one{
    0%{
        -webkit-transform:rotateX(35deg) rotateY(-45deg) rotateZ(0deg);
        transform:rotateX(35deg) rotateY(-45deg) rotateZ(0deg)
    }
    100%{
        -webkit-transform:rotateX(35deg) rotateY(-45deg) rotateZ(360deg);
        transform:rotateX(35deg) rotateY(-45deg) rotateZ(360deg)
    }
}
@keyframes rotate-one{
    0%{
        -webkit-transform:rotateX(35deg) rotateY(-45deg) rotateZ(0deg);
        transform:rotateX(35deg) rotateY(-45deg) rotateZ(0deg)
    }
    100%{
        -webkit-transform:rotateX(35deg) rotateY(-45deg) rotateZ(360deg);
        transform:rotateX(35deg) rotateY(-45deg) rotateZ(360deg)
    }
}
@-webkit-keyframes rotate-two{
    0%{
        -webkit-transform:rotateX(50deg) rotateY(10deg) rotateZ(0deg);
        transform:rotateX(50deg) rotateY(10deg) rotateZ(0deg)
    }
    100%{
        -webkit-transform:rotateX(50deg) rotateY(10deg) rotateZ(360deg);
        transform:rotateX(50deg) rotateY(10deg) rotateZ(360deg)
    }
}
@keyframes rotate-two{
    0%{
        -webkit-transform:rotateX(50deg) rotateY(10deg) rotateZ(0deg);
        transform:rotateX(50deg) rotateY(10deg) rotateZ(0deg)
    }
    100%{
        -webkit-transform:rotateX(50deg) rotateY(10deg) rotateZ(360deg);
        transform:rotateX(50deg) rotateY(10deg) rotateZ(360deg)
    }
}
@-webkit-keyframes rotate-three{
    0%{
        -webkit-transform:rotateX(35deg) rotateY(55deg) rotateZ(0deg);
        transform:rotateX(35deg) rotateY(55deg) rotateZ(0deg)
    }
    100%{
        -webkit-transform:rotateX(35deg) rotateY(55deg) rotateZ(360deg);
        transform:rotateX(35deg) rotateY(55deg) rotateZ(360deg)
    }
}
@keyframes rotate-three{
    0%{
        -webkit-transform:rotateX(35deg) rotateY(55deg) rotateZ(0deg);
        transform:rotateX(35deg) rotateY(55deg) rotateZ(0deg)
    }
    100%{
        -webkit-transform:rotateX(35deg) rotateY(55deg) rotateZ(360deg);
        transform:rotateX(35deg) rotateY(55deg) rotateZ(360deg)
    }
}


    </style>
</head>

<body>
    <div id="livelo-spinner" style="display: block !important;">
        <div class="loader">
            <div class="inner one"></div>
            <div class="inner two"></div>
            <div class="inner three"></div>
        </div>
    </div>
</body>

</html>