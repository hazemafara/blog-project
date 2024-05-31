<style>
    .navbar {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        padding: 16px 20px 30px 20px;
        display: flex;
        align-items: center;
        transition: 0.3s ease-out;
        backdrop-filter: blur(8px) brightness(1.2);
        -webkit-backdrop-filter: blur(8px) brightness(1.2);
        text-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
        color: rgb(236, 72, 153);
        font-size: 16px;
    }

    .navbar.mask {
        top: 150px;
        mask-image: linear-gradient(black 70%, transparent);
        -webkit-mask-image: linear-gradient(black 70%, transparent);
    }

    .navbar.mask-pattern {
        top: 300px;
        mask-image: url("data:image/svg+xml, %3Csvg xmlns=%27http://www.w3.org/2000/svg%27 viewBox=%270 0 12.21 10.57%27%3E%3Cpath fill=%27%23ffffff%27 d=%27M6.1 0h6.11L9.16 5.29 6.1 10.57 3.05 5.29 0 0h6.1z%27/%3E%3C/svg%3E"), linear-gradient(black calc(100% - 30px), transparent calc(100% - 30px));
        -webkit-mask-image: url("data:image/svg+xml, %3Csvg xmlns=%27http://www.w3.org/2000/svg%27 viewBox=%270 0 12.21 10.57%27%3E%3Cpath fill=%27%23ffffff%27 d=%27M6.1 0h6.11L9.16 5.29 6.1 10.57 3.05 5.29 0 0h6.1z%27/%3E%3C/svg%3E"), linear-gradient(black calc(100% - 30px), transparent calc(100% - 30px));
    }

    @media (min-width: 640px) {
        .navbar {
            padding: 16px 50px 30px 50px;
        }
    }

    .navbar.is-hidden {
        transform: translateY(-100%);
    }

    .navbar a {
        color: inherit;
        text-decoration: none;
    }

    .navbar a:hover,
    .navbar a:focus {
        text-decoration: underline;
    }

    .list {
        list-style-type: none;
        margin-left: auto;
        display: none;
    }

    @media (min-width: 640px) {
        .list {
            display: flex;
        }

        .list li {
            margin-left: 20px;
        }
    }

    .search-button,
    .menu-button {
        display: inline-block;
        padding: 0;
        font-size: 0;
        background: none;
        border: none;
        filter: drop-shadow(0 0 5px rgba(0, 0, 0, .5));
    }

    @media (min-width: 640px) {
        .search-button {
            margin-left: 20px;
        }
    }

    .search-button::before {
        content: '';
        display: inline-block;
        width: 2rem;
        height: 2rem;
        background: center/1.3rem 1.3rem no-repeat url("data:image/svg+xml, %3Csvg%20xmlns=%27http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%27%20viewBox=%270%200%2015.17%2014.81%27%20width=%2715.17%27%20height=%2714.81%27%3E%3Cpath%20d=%27M6,.67A5.34,5.34,0,1,1,.67,6,5.33,5.33,0,0,1,6,.67ZM9.86,9.58l4.85,4.75Z%27%20fill=%27none%27%20stroke=%27%23fff%27%20stroke-width=%271.33%27%2F%3E%3C%2Fsvg%3E");
    }

    .menu-button::before {
        content: url("data:image/svg+xml, %3Csvg%20xmlns=%27http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%27%20viewBox=%270%200%2024.8%2018.92%27%20width=%2724.8%27%20height=%2718.92%27%3E%3Cpath%20d=%27M23.8,9.46H1m22.8,8.46H1M23.8,1H1%27%20fill=%27none%27%20stroke=%27%23fff%27%20stroke-linecap=%27round%27%20stroke-width=%272%27%2F%3E%3C%2Fsvg%3E")
    }

    @media (min-width: 640px) {
        .menu-button {
            display: none;
        }
    }

    img {
        width: 100%;
        object-fit: cover;
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        min-width: 160px;
        z-index: 1;
    }

    .dropdown-content a {
        color: rgb(236, 72, 153);
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .dropbtn {
        margin-right: 30px;

    }
</style>
<nav class="navbar">
    <a href="/index" class="navbar__link">HOME</a>
    <ul class="list">
        <li><a href="/tags" class="list__link">TAGS</a></li>
        <li><a href="/blogs/create" class="list__link">CREATE</a></li>
        <li><a href="/about-us" class="list__link">ABOUT US</a></li>
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">PROFILE</a>
            <div class="dropdown-content">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                  this.closest('form').submit();">Logout</a>
                </form>
            </div>
        </li>
    </ul>
    <button class="search-button">Search</button>
    <button class="menu-button">Menu</button>
</nav>
