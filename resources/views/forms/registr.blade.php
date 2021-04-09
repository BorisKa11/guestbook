<div class="enter registerDialog">
    <div class="enter__fon"></div>
    <a href="javascript:;" class="enter__close closeRegister"></a>
    <div class="enter__form">
        <h3 class="enter__h3">Регистрация в гостевой книге</h3>
        <form action="" method="post" id="form-registr">
            <div class="form-group">
                <label for="emailr">Ваш email</label>
                <input type="email" required name="email" class="enter__form form-control" id="emailr" aria-describedby="emailHelp" placeholder="введите email">
                <small id="emailHelp" class="form-text">Часть email до знака "@" будет использована как подпись.</small>
            </div>
            <div class="form-group">
                <label for="passwordr">Пароль</label>
                <input type="password" required name="password" class="form-control" id="passwordr" placeholder="Ваш пароль">
            </div>
            <div class="form-group">
                <label for="password2">Повторите пароль</label>
                <input type="password" required name="password2" class="form-control" id="password2" placeholder="Ваш пароль">
            </div>
            <div class="bottom">
                <a href="javascript:;" class="btn btn-link enter__form__next enterLink">Вход</a>
                <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
            </div>
            @csrf
        </form>
    </div>
</div>