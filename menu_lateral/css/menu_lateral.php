<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');

    :root {
        --primary-color: #222324;
        --secondary-color: #171717;
        --accent-color: #51b3ec;
        --text-color: #ccc;
        --hover-color: #f0f0f0;
    }

    * {
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
    }

    header {
        background: var(--primary-color);
        padding: 20px;
        width: 100%;
        height: 30px;
        position: fixed;
        z-index: 9999;
    }

    .menuButton {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        gap: 6%;
        color: #090909;
        width: 2em;
        height: 2em;
        border-radius: 0.3em;
        background: var(--secondary-color);
        border: 1px solid var(--secondary-color);
        transition: all .3s;
        box-shadow: inset 2px 2px 8px #3a3a3a, inset -2px -2px 8px #000000;
        position: relative;
        z-index: 9999;
        margin-left: 10px;
        top: -8%;
    }

    .menuButton:hover {
        border: 1px solid black;
    }

    .menuButton:active {
        color: #666;
        box-shadow: 4px 4px 8px #3a3a3a, -4px -4px 8px #000000;
    }

    input[type="checkbox"] {
        -webkit-appearance: none;
        display: none;
        visibility: hidden;
    }

    .menuButton span {
        width: 15px;
        height: 2px;
        background: rgb(200, 200, 200);
        border-radius: 100px;
        transition: 0.3s ease;
    }

    input[type]:checked~span.top {
        transform: translateY(190%) rotate(45deg);
        width: 20px;
    }

    input[type]:checked~span.bot {
        transform: translateY(-170%) rotate(-45deg);
        width: 20px;
        box-shadow: 0 0 6px #495057;
    }

    input[type]:checked~span.mid {
        transform: translateX(-10px);
        opacity: 0;
    }

    .left {
        margin-left: 3%;
        position: relative;
        z-index: 9999;
        top: -35px;
    }

    .left h3 {
        color: #fff;
        margin: 0;
        text-transform: uppercase;
        font-size: 22px;
        font-weight: 800;
    }

    .left span {
        color: #8c9196;
    }

    .sidebar {
        width: 290px;
        height: 100%;
        top: 0;
        left: 0;
        background: var(--primary-color);
        padding-top: 70px;
        overflow-y: auto;
        transition: left 0.5s;
        position: fixed;
    }

    .sidebar::-webkit-scrollbar {
        width: 0;
    }

    .sidebar .image {
        width: 100px;
        height: 100px;
        border-radius: 100px;
    }

    .sidebar h2 {
        color: var(--text-color);
        margin-top: 0;
        margin-bottom: 20px;
    }

    .sidebar p {
        color: var(--text-color);
        margin-top: 10px;
        margin-bottom: 0;
        padding-left: 30px;
    }

    .sidebar a {
        color: #fff;
        display: block;
        width: 100%;
        line-height: 35px;
        text-decoration: none;
        padding-left: 40px;
        box-sizing: border-box;
        font-size: 19px;
        transition: background 0.5s;
    }

    .sidebar a:hover {
        background: var(--accent-color);
    }

    .sidebar ion-icon {
        padding-right: 10px;
    }

    #check {
        display: none;
    }

    label #sidebar_btn {
        position: fixed;
        left: 10px;
        color: #fff;
        font-size: 25px;
        margin: 5px 0;
        cursor: pointer;
        transition: color 0.5s;
    }

    label #sidebar_btn:hover {
        color: var(--accent-color);
    }

    #check:checked~.sidebar {
        left: -290px;
    }

    #check:checked~.sidebar a span {
        display: none;
    }

    #check:checked~.sidebar a {
        font-size: 20px;
        margin-left: 170px;
        width: 80px;
    }

    .content {
        background-size: cover;
        background-position: center;
        height: 100px;
        transition: margin-left 0.5s;
        margin-left: 290px;
    }

    #check:checked~.content {
        margin-left: 0;
    }

    .container a {
        text-decoration: none;
    }

    .container h5 {
        margin-left: 5px;
    }

    .container span {
        display: inline-flex;
        align-items: center;
    }

    .submenu {
        display: none;
    }

    .submenu.active {
        display: block;
    }

    .toggle {
        cursor: pointer;
    }

    .toggle span {
        display: flex;
        align-items: center;
    }

    .toggle:hover {
        background-color: var(--hover-color);
    }

    .submenu a {
        font-size: 14px;
        margin-left: 20px;
    }

    .redes-sociais {
        display: flex;
        margin-top: 40%;
        color: white;
        margin-left: 30px;
    }

    .redes-sociais a {
        margin-right: -170px;
        padding-left: 0px;
    }

    .botao-sair-ok {
        display: flex;
        align-items: center;
        justify-content: flex-start;
        width: 45px;
        height: 45px;
        border: none;
        border-radius: 50%;
        cursor: pointer;
        position: relative;
        overflow: hidden;
        transition-duration: .3s;
        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.199);
        background-color: rgb(255, 65, 65);
        margin-left: 90%;
        top: -77px;
    }

    .sign {
        width: 100%;
        transition-duration: .3s;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .sign svg {
        width: 17px;
    }

    .sign svg path {
        fill: white;
    }

    .text {
        position: absolute;
        right: 0%;
        width: 0%;
        opacity: 0;
        color: white;
        font-size: 1.2em;
        font-weight: 600;
        transition-duration: .3s;
    }

    .botao-sair-ok:hover {
        width: 125px;
        border-radius: 40px;
        transition-duration: .3s;
    }

    .botao-sair-ok:hover .sign {
        width: 30%;
        transition-duration: .3s;
        padding-left: 20px;
    }

    .botao-sair-ok:hover .text {
        opacity: 1;
        width: 70%;
        transition-duration: .3s;
        padding-right: 10px;
    }

    .botao-sair-ok:active {
        transform: translate(2px, 2px);
    }

    .botao-sair-ok:active .sign svg {
        fill: #ccc;
    }

    @media only screen and (max-width: 768px) {
        .left {
            margin-left: 13%;
        }

        header {
            width: 100%;
        }

        .sidebar {
            width: 52%;
            padding-top: 100px;
        }

        #check:checked~.sidebar {
            left: 0;
        }

        label #sidebar_btn {
            left: 10px;
        }

        .botao-sair-ok {
            margin-left: 68%;
        }

        #check:checked~.content {
            margin-left: 0;
        }

        .botao-atalho-menu {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            width: 45px;
            height: 45px;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            position: fixed;
            bottom: 20px;
            right: 20px;
            overflow: hidden;
            transition-duration: .3s;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.199);
            background-color: rgb(255, 65, 65);
        }

        .botao-atalho-menu svg {
            width: 17px;
        }

        .botao-atalho-menu svg path {
            fill: white;
        }

        .frase-bota-atalho-menu {
            position: absolute;
            right: 0%;
            width: 0%;
            opacity: 0;
            color: white;
            font-size: 1.2em;
            font-weight: 600;
            transition-duration: .3s;
        }

        .botão-atalho-menu:hover {
            width: 125px;
            border-radius: 40px;
            transition-duration: .3s;
        }

        .botão-atalho-menu:hover .botao-atalho-menu {
            width: 30%;
            transition-duration: .3s;
            padding-left: 20px;
        }

        .botão-atalho-menu:hover .frase-bota-atalho-menu {
            opacity: 1;
            width: 70%;
            transition-duration: .3s;
            padding-right: 10px;
        }

        .botão-atalho-menu:active {
            transform: translate(2px, 2px);
        }
    }

    @media only screen and (min-width: 769px) {
        .botao-atalho-menu {
            display: none;
        }
    }

    .menu-lateral-div {
        color: red;
    }

    .sidebar.collapsed {
        display: none;
    }

    .inicializador.collapsed {
        margin-left: 20px;
    }
</style>