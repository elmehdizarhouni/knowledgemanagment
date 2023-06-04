<style>
    .group {
        display: flex;
        line-height: 28px;
        align-items: center;
        position: relative;
        max-width: 190px;
        margin-left: 650px;
    }

    .input {
        height: 40px;
        line-height: 28px;
        padding: 0 1rem;
        width: 100%;
        padding-left: 2.5rem;
        border: 2px solid transparent;
        border-radius: 8px;
        outline: none;
        background: linear-gradient(to right, #F5F5DC, #8B4513);
        border-color: linear-gradient(to right, #F5F5DC, #8B4513);
        color: #8B4513;
        box-shadow: 0 0 5px #C1D9BF, 0 0 0 5px #8B4513;
        transition: .3s ease;
    }

    .input::placeholder {
        color:#8B4513;
    }

    .icon {
        position: absolute;
        left: 1rem;
        fill: #8B4513;
        width: 1rem;
        height: 1rem;
    }
</style>
<form action="{{ route('employes.search') }}" class="d-flex mr-3">
    <div class="group">
        <input type="text" name="q" class="input" placeholder="Recherche">
        <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path d="M19.707,18.293l-3.866-3.866A6.917,6.917,0,1,0,12,19.917,6.917,6.917,0,0,0,18.917,13H18.5l-.266-.266a.914.914,0,0,0-.646-.268h-.233a7,7,0,1,0-7-7v.233a.914.914,0,0,0,.268.646L10.083,7.5V7.083a6.917,6.917,0,0,0-6.917,6.917A6.917,6.917,0,0,0,7.083,18.5h.416L7.833,18.23A.914.914,0,0,0,8.1,17.964v-.233a7,7,0,1,0,7,7h.233a.914.914,0,0,0,.646-.268l2.464-2.464v.417A6.917,6.917,0,0,0,19.707,18.293ZM3.5,12a8.5,8.5,0,1,1,8.5-8.5A8.509,8.509,0,0,1,3.5,12Z"/>
        </svg>
</div>
</form>










