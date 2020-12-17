<div class="container">

    {{--    <div class="dropdown">--}}
    {{--        <button class="btn btn-sm btn-success dropdown-toggle col-md-4" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
    {{--            Добавить тест блок--}}
    {{--        </button>--}}
    {{--        <div class="dropdown-menu">--}}
    {{--            <li><button onclick="add_field()">ADD FIELD</button></li>--}}
    {{--            <li><a class="dropdown-item" href="#">Курс 2</a></li>--}}
    {{--            <li><a class="dropdown-item" href="#">Курс 3</a></li>--}}
    {{--        </div>--}}
    {{--    </div>--}}

    {{--    <form id="form"  method="POST" action="save_data.php">--}}

    {{--            <div class="form-group">--}}
    {{--                <label for="user-login">Test name</label>--}}
    {{--                <input name="login" value="" class="form-control " id="user-login">--}}
    {{--            </div>--}}

    {{--            <div class="form-group">--}}

    {{--                <input type="text" class="form-control " name="text_field[]">--}}

    {{--            </div>--}}
    {{--            <button type="submit">SUBMIT</button>--}}
    {{--        </form>--}}
    {{--        <button onclick="add_field()">ADD FIELD</button>--}}

    {{--            </div>--}}
    {{--        </div>--}}

    {{--        <script>--}}
    {{--            function add_field(){--}}

    {{--                var y = document.getElementById("form");--}}
    {{--                // создаем новое поле ввода--}}
    {{--                var new_field = document.createElement("input");--}}
    {{--                // установим для поля ввода тип данных 'text'--}}
    {{--                new_field.setAttribute("type", "text");--}}
    {{--                // установим имя для поля ввода--}}
    {{--                new_field.setAttribute("name", "text_field[]");--}}
    {{--                new_field.setAttribute("class", "form-control");--}}
    {{--                // определим место вствки нового поля ввода (перед каким элементом его вставить)--}}
    {{--                var pos = y.childElementCount;--}}

    {{--                // добавим поле ввода в форму--}}
    {{--                y.insertBefore(new_field, y.childNodes[pos]);--}}
    {{--            }--}}
    {{--        </script>--}}














    <div class="card">
        <div class="card-body">

            <div id="div">



            </div>
            <button onclick="add_form()">ADD Form</button>

            <script>
                function add_form(){
                    var y = document.getElementById("div");
                    var new_form = document.createElement("form");
                    new_form.setAttribute("id", "1");
                    new_form.setAttribute("method", "POST");
                    new_form.setAttribute("action", "action");
                    var pos = y.childElementCount;
                    y.insertBefore(new_form, y.childNodes[pos]);

                    var z = document.getElementById("div");
                    var input = document.createElement("button");
                    input.setAttribute("onclick", "add_input()");
                    var pos2 = z.childElementCount;
                    z.insertBefore(input, z.childNodes[pos2]);


                }
            </script>
            <script>
                function add_input(){
                    var x = document.getElementById("1");
                    var input = document.createElement("input");
                    input.setAttribute("type", "text");
                    var pos1 = x.childElementCount;
                    x.insertBefore(input, x.childNodes[pos1]);
                }
            </script>


        </div>
    </div>
</div>


