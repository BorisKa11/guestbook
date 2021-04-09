<div class="enter enterDialog">
    <div class="enter__fon"></div>
    <a href="javascript:;" class="enter__close closeEnter"></a>
    <div class="enter__form">
        <h3 class="enter__h3">Вход в гостевую книгу</h3>
        <form action="" method="post" id="form-enter">
            <div class="form-group">
                <label for="emaile">Ваш email</label>
                <input type="email" required name="email" class="enter__form form-control" id="emaile" placeholder="введите email">
            </div>
            <div class="form-group">
                <label for="passworde">Пароль</label>
                <input type="password" required name="password" class="form-control" id="passworde" placeholder="Ваш пароль">
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="check" name="remember">
                <label class="form-check-label" for="check">Запомнить</label>
            </div>
            <div class="bottom">
                <a href="javascript:;" class="btn btn-link enter__form__next registerLink">Регистрация</a>
                <button type="submit" class="btn btn-primary">Войти</button>
            </div>
            @csrf
        </form>
    </div>
</div>