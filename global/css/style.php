<style>
    .row {
        display: flex;
        flex-wrap: wrap;
        margin-left: -15px;
        margin-right: -15px;
    }

    .col-md-12 {
        position: relative;
        width: 100%;
        min-height: 1px;
        padding-left: 15px;
        padding-right: 15px;
    }

    @media (min-width: 768px) {
        .col-md-3 {
            flex: 0 0 25%;
            max-width: 25%;
        }

        .col-md-9 {
            flex: 0 0 75%;
            max-width: 75%;
        }
    }

    @media (min-width: 992px) {
        .col-md-12 {
            max-width: 100%;
        }
    }

    .btn {
        display: inline-block;
        font-weight: 400;
        color: #212529;
        text-align: center;
        vertical-align: middle;
        background-color: transparent;
        border: 1px solid transparent;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
        border-radius: 0.25rem;
        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        text-decoration: none;
    }

    .btn-primary {
        color: #fff;
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0069d9;
        border-color: #0062cc;
    }

    .btn-success {
        color: #fff;
        background-color: #28a745;
        border-color: #28a745;
    }

    .btn-success:hover {
        background-color: #218838;
        border-color: #1e7e34;
    }

    .btn-danger {
        color: #fff !important;
        background-color: #dc3545 !important;
        border-color: #dc3545 !important;
    }

    .btn-danger:hover {
        background-color: #c82333;
        border-color: #bd2130;
    }

    @media (max-width: 767px) {
        .col-md-3,
        .col-md-9,
        .col-md-12 {
            max-width: 100%;
            padding-left: 5px;
            padding-right: 5px;
        }
    }

    .mt-4 {
        margin-top: 1.5rem !important;
    }

    .dropdown-menu {
        position: absolute;
        z-index: 1000;
        right: 0;
        background-color: #f9f9f9;
        min-width: 150px;
        padding: 0.5rem 0;
        margin: 0;
        font-size: 1rem;
        color: #212529;
        text-align: left;
        border: 1px solid rgba(0, 0, 0, 0.15);
        border-radius: 0.25rem;
        box-shadow: 0 2px 5px rgba(0, 0, 0, .1);
        display: none;
        list-style: none;
    }

    .dropdown-menu.show {
        display: block;
    }

    .dropdown-item {
        display: block;
        width: 100%;
        padding: 0.25rem 1.5rem;
        clear: both;
        font-weight: 400;
        color: #212529;
        text-align: inherit;
        white-space: nowrap;
        background-color: transparent;
        border: 0;
        cursor: pointer;
        text-decoration: none;
    }

    .dropdown-item:hover {
        color: #16181b;
        background-color: #add8e6;
        width: 70%;
    }

    .inicializador {
        margin-left: 20%;
        position: relative;
        width: 80%;
        margin-top: 5%;
    }

    @media only screen and (max-width: 1440px) and (max-height: 900px) {
        .inicializador {
            margin-left: 22%;
            width: 75%;
            margin-top: 50px;
        }
    }

    @media only screen and (max-width: 1024px) {
        .inicializador {
            margin-left: 75%;
            width: 70%;
            margin-top: 50px;

        }
    }

    @media only screen and (max-width: 768px) {
        .inicializador {
            margin-left: 70%;
            width: 70%;
            margin-top: 50px;

        }
    }

    @media only screen and (max-width: 480px) {
        .inicializador {
            margin-left: 55%;
            width: 80%;
            margin-top: 50px;
        }
    }

    .grupo-menu {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-radius: 10px;
    }

    .grupo-menu h1 {
        margin-top: 10px;
        margin-left: 10px;
    }

    .fa-info-circle:before {
        content: "\f05a";
        font-size: 15px;
        color: grey;
    }

    .botoes {
        display: flex;
        justify-content: space-between;
    }

    .input-container {
        position: relative;
        border: 1px solid #ccc;
        border-radius: 20px;
        overflow: hidden;
        margin-top: 5px;
        margin-bottom: 5px;
    }

    .input-container input,
    .form button {
        outline: none;
        border: 1px solid #e5e7eb;
        border-radius: 20px
    }

    .input-container input,
    .form a {
        outline: none;
        border: 1px solid #f7f5f5;
        border-radius: 20px
    }

    .input-container input {
        background-color: #fff;
        padding: 1rem;
        padding-right: 3rem;
        font-size: 0.875rem;
        line-height: 1.25rem;
        width: 100%;
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        cursor: pointer;
        height: 73%;
    }

    .input-container select {
        width: 100%;
        border: none;
        background: transparent;
        padding: 10px;
        font-size: 16px;
        outline: none;
        cursor: pointer;
        background-color: #fff;
    }

    .input-container select:focus {
        border: none;
    }

    .input-container::after {
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        pointer-events: none;
    }

    .card {
        width: 190px;
        height: 254px;
        border-radius: 30px;
        background: #e0e0e0;
        box-shadow: 15px 15px 30px #bebebe,
            -15px -15px 30px #ffffff;
    }

    .form {
        background-color: #f7f5f5;
        display: block;
        padding: 1rem;
        max-width: 100%;
        border-radius: 0.5rem;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        border: 1px solid #d5d3d3;
    }

    .form-title {
        font-size: 1.25rem;
        line-height: 1.75rem;
        font-weight: 600;
        text-align: center;
        color: #000;
    }

    .input-container {
        position: relative;
    }

    .input-container span {
        display: grid;
        position: absolute;
        top: 0;
        bottom: 0;
        right: 0;
        padding-left: 1rem;
        padding-right: 1rem;
        place-content: center;
    }

    .input-container span svg {
        color: #9CA3AF;
        width: 1rem;
        height: 1rem;
    }

    .botoes {
        text-align: center;
    }

    .botoes .btn,
    .botoes a {
        display: inline-block;
        vertical-align: middle;
        margin-right: 10px;
    }

    .botoes button {
        display: inline-block;
        vertical-align: middle;
        margin-right: 10px;
    }

    .botoes svg {
        top: 10px;
    }

    .form-group {
        margin-bottom: 1rem;
    }

    .col-md-6 {
        flex: 0 0 auto;
        width: 49%;
        margin-left: 0.7%;
    }

    .btn-success {
        cursor: pointer;
    }

    .box-laranja,
    .box-verde,
    .box-vermelha {
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        height: 35px;
        width: 100px;
    }

    .box-laranja {
        background-color: #fbb026b3;
        border: solid 1px #b18405;
    }

    .box-verde {
        background-color: #43ff43b0;
        border: solid 1px #1cb919;
    }

    .box-vermelha {
        background-color: #ff3434c7;
        border: solid 1px #ff0000;
    }

    .cabecalho-botoes-aprovacao input[type="radio"] {
        display: none;
    }

    .tab {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 30px;
        width: 50px;
        font-size: .8rem;
        color: black;
        font-weight: 500;
        border-radius: 99px;
        cursor: pointer;
        transition: color 0.15s ease-in;
    }

    .cabecalho-botoes-aprovacao {
        margin-left: 3%;
    }

    .cabecalho-botoes-aprovacao input[type="radio"]:checked+label {
        color: #185ee0;
    }

    .cabecalho-botoes-aprovacao input[type="radio"]:checked+label>.notification {
        background-color: #185ee0;
        color: #fff;
        margin: 0px;
    }

    .cabecalho-botoes-aprovacao input[id="radio-1"]:checked~.glider {
        transform: translateX(0);
    }

    .cabecalho-botoes-aprovacao input[id="radio-2"]:checked~.glider {
        transform: translateX(100%);
    }

    .cabecalho-botoes-aprovacao input[id="radio-3"]:checked~.glider {
        transform: translateX(200%);
    }

    @media (max-width: 700px) {
        .tabelinhas {
            transform: scale(0.6);
        }
    }

    @media (min-width: 768px) and (max-width: 991px) {
        .col-md-1 {
            flex: 0 0 8.333333%;
            max-width: 8.333333%;
        }
    }

    .botao-menu-atalho {
        display: flex;
        align-items: center;
        justify-content: flex-start;
        width: 35px;
        height: 35px;
        border: none;
        border-radius: 50%;
        cursor: pointer;
        position: relative;
        overflow: hidden;
        transition-duration: .3s;
        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.199);
        background-color: #fff;
        margin-right: 10px;
    }

    .bota-atalho-menu-2 {
        width: 100%;
        transition-duration: .3s;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .bota-atalho-menu-2 svg {
        width: 17px;
    }

    .bota-atalho-menu-2 svg path {
        fill: #000000;
    }

    .frase-botao-menu {
        position: absolute;
        right: 0%;
        width: 0%;
        opacity: 0;
        color: #000000;
        font-size: 1.2em;
        font-weight: 600;
        transition-duration: .3s;
    }

    .botao-menu-atalho:hover {
        width: 125px;
        border-radius: 40px;
        transition-duration: .3s;
    }

    .botao-menu-atalho:hover .bota-atalho-menu-2 {
        width: 30%;
        transition-duration: .3s;
        padding-left: 20px;
    }

    .botao-menu-atalho:hover .frase-botao-menu {
        opacity: 1;
        width: 70%;
        transition-duration: .3s;
        padding-right: 10px;
    }

    .botao-menu-atalho:active {
        transform: translate(2px, 2px);
    }

    .toast-container {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 9999;
    }

    .toast {
        position: relative;
        max-width: 350px;
        width: 100%;
        padding: .75rem 1.25rem;
        margin-bottom: 1rem;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid rgba(0, 0, 0, .125);
        border-radius: .25rem;
        box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .1);
    }

    .toast-header {
        display: flex;
        align-items: center;
        padding: .25rem .75rem;
        color: #6c757d;
        background-color: rgba(0, 0, 0, .03);
        border-bottom: 1px solid rgba(0, 0, 0, .125);
        border-radius: .25rem .25rem 0 0;
    }

    .toast .close {
        position: absolute;
        top: 0;
        right: 0;
        padding: .75rem 1.25rem;
        color: #000;
        opacity: .5;
        transition: opacity 0.15s linear;
        background-color: transparent;
        border: 0;
        cursor: pointer;
    }

    .toast .close:hover {
        opacity: .9;
    }


    .alert-success {
        color: #155724;
        background-color: #d4edda;
        border-color: #c3e6cb;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 20px;
        height: 50px;
        margin-bottom: 10px;
        max-width: 50%;
    }


    .alert-danger {
        color: #721c24;
        background-color: #f8d7da;
        border-color: #f5c6cb;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 20px;
        height: 50px;
        margin-bottom: 10px;
        max-width: 80%;
    }

    .alert-warning {
        color: #856404;
        background-color: #fff3cd;
        border-color: #ffeeba;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 20px;
        height: 50px;
        margin-bottom: 10px;
        width: 50%;
    }

    .alert-info {
        color: #0c5460;
        background-color: #d1ecf1;
        border-color: #bee5eb;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 20px;
        height: 50px;
        margin-bottom: 10px;
        width: 50%;
    }

    .toast-alert-div {
        width: 500px;
    }

    .bin-button {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        border-radius: 15px;
        background-color: rgb(255, 95, 95);
        cursor: pointer;
        border: 3px solid rgb(255, 201, 201);
        transition-duration: 0.3s;
        margin-left: 5px
    }

    .bin-bottom {
        width: 10px;
    }

    .bin-top {
        width: 12px;
        transform-origin: right;
        transition-duration: 0.3s;
    }

    .bin-button:hover .bin-top {
        transform: rotate(45deg);
    }

    .bin-button:hover {
        background-color: rgb(255, 0, 0);
    }

    .bin-button:active {
        transform: scale(0.9);
    }
</style>