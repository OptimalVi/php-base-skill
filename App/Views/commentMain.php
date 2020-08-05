<div class="container">
    <? include 'components/listComments.php' ?>
    <form action="/Comment/add" method="POST" class="form formComment">
        <fieldset class="formComment__warpper">
            <legend class="formComment__title"> Оставить комментарий</legend>
            <label for="" class="label formComment__label">Ваше имя</label>
            <input type="text" required name="name" class="form__item formComment__input">
            <label for="" class="label formComment__label">Ваш комментарий</label>
            <textarea name="text" required  rows="10px"
                      class="form__item form__item_inherit formComment__input"></textarea>
            <div class="formComment__btnWrap">
                <button type="submit" class="btn form__item form__item_inherit formComment__btn">Отправить</button>
            </div>
        </fieldset>
    </form>

</div>

