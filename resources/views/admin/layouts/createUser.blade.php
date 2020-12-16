<div class="container">
    <div class="card">
        <div class="card-body">


            <form method="POST" enctype="multipart/form-data" action="">
                @csrf

                <div class="form-group">
                    <label for="user-login">Login</label>
                    <p>*это поле является обязательным</p>
                    <input name="login" value="" class="form-control " id="user-login">

                </div>
                <div class="form-group">
                    <label for="user-name">Name</label>
                    <p>*это поле является обязательным</p>
                    <input name="name" value="" class="form-control " id="user-name">

                </div>
                <div class="form-group">
                    <label for="user-surname">Surname</label>
                    <input name="surname" value="" class="form-control" id="user-surname">

                </div>
                <div class="form-group">
                    <label for="user-birthdate">Birthdate</label>
                    <p>*это поле является обязательным</p>
                    <input name="birthdate" value="" class="form-control " id="user-birthdate">

                </div>
                <div class="form-group">
                    <label for="user-email">Email</label>
                    <input name="email" value="" class="form-control" id="user-email">

                </div>
                <div class="form-group">
                    <label for="user-address">Course</label>
                    <div class="dropdown">
                        <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Назначить курс
                        </button>
                        <div class="dropdown-menu">
                            <li><a class="dropdown-item" href="/">Курс 1</a></li>
                            <li><a class="dropdown-item" href="#">Курс 2</a></li>
                            <li><a class="dropdown-item" href="#">Курс 3</a></li>
                        </div>
                    </div>
                </div>
                <button class="btn btn-success">Отправить</button>
            </form>
        </div>
    </div>
</div>

