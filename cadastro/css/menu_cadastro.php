<style>
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
    }

    .botao-menu-atalho:hover {
        width: 125px;
        border-radius: 40px;
    }

    .botao-menu-atalho:active {
        transform: translate(2px, 2px);
    }

    .bota-atalho-menu-2,
    .frase-botao-menu {
        transition-duration: .3s;
    }

    .bota-atalho-menu-2 {
        width: 100%;
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
    }

    .botao-menu-atalho:hover .bota-atalho-menu-2 {
        width: 30%;
        padding-left: 20px;
    }

    .botao-menu-atalho:hover .frase-botao-menu {
        opacity: 1;
        width: 70%;
        padding-right: 10px;
    }
</style>