<div class="container">
    <div class="card">
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data" action="">
                @csrf

                <div class="form-group">
                    <label for="user-login">Course name</label>
                    <p>*это поле является обязательным</p>
                    <input name="login" value="" class="form-control " id="user-login">

                </div>
                <div class="form-group">
                    <label for="user-name">Description</label>
                    <p>*это поле является обязательным</p>
                    <input name="name" value="" class="form-control " id="user-name">

                </div>
                <div class="form-group">
                    <label for="user-surname">Block</label>
                    <input name="surname" value="" class="form-control" id="user-surname">

                </div>
                <button class="btn btn-success">Отправить</button>
            </form>
        </div>
    </div>
</div>
