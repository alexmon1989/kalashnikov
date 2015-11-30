<!DOCTYPE html>
<head>
    <base href="{{ url() . '/' }}">

    <!-- Meta -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- CSS Global Compulsory -->
    <!--<link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }} ">-->

    <style>
        * {
            font-family: times;
        }
    </style>
</head>

<body>

    <h2>{{ $username }}</h2>
    <h3><small>{{ $vacancy_title }}</small></h3>
    <hr>

    <p style="text-align: center"><img src="{{ asset($photo_path) }}"></p>

    <p>Дата и место рождения, возраст: <strong>{{ $birthdate }}</strong><br>
    Домашний адрес (фактический): <strong>{{ $address_fact }}</strong><br>
    Домашний адрес (по прописке): <strong>{{ $address_reg }}</strong><br>
    Телефон домашний: <strong>{{ $phone_home }}</strong><br>
    Телефон мобильный: <strong>{{ $phone_mobile }}</strong><br>
    E-Mail: <strong>{{ $email }}</strong><br>
    Семейное положение: <strong>{{ $marital_status }}</strong><br>
    Дети: <strong>{{ $has_children == 1 ? 'Есть' : 'Нету' }}</strong><br>
    Возраст детей: <strong>{{ $children_age }}</strong></p>
    </p>

    <h4>Состав семьи:</h4>

    <table border="1">
        <thead>
        <tr>
            <th>#</th>
            <th>Степень родства</th>
            <th>Фамилия, имя, отчество</th>
            <th>Род занятий</th>
            <th>Год рождения</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>{{ $relation_degree_1 }}</td>
                <td>{{ $relation_name_1 }}</td>
                <td>{{ $relation_occupation_1 }}</td>
                <td>{{ $relation_birth_year_1 }}</td>
            </tr>
            <tr>
                <td>2</td>
                <td>{{ $relation_degree_2 }}</td>
                <td>{{ $relation_name_2 }}</td>
                <td>{{ $relation_occupation_2 }}</td>
                <td>{{ $relation_birth_year_2 }}</td>
            </tr>
            <tr>
                <td>3</td>
                <td>{{ $relation_degree_3 }}</td>
                <td>{{ $relation_name_3 }}</td>
                <td>{{ $relation_occupation_3 }}</td>
                <td>{{ $relation_birth_year_3 }}</td>
            </tr>
            <tr>
                <td>4</td>
                <td>{{ $relation_degree_4 }}</td>
                <td>{{ $relation_name_4 }}</td>
                <td>{{ $relation_occupation_4 }}</td>
                <td>{{ $relation_birth_year_4 }}</td>
            </tr>
        </tbody>
    </table>


    <p>Водительские права: <strong>{{ $drivers_license == 1 ? 'Есть' : 'Нету' }}</strong><br>
      Категория: <strong>{{ strtoupper($drivers_license_category) }}</strong><br>
      Стаж вождения: <strong>{{ $driving_experience }}</strong><br>
      Наличие автомобиля (марка): <strong>{{ $automobile }}</strong><br>
      Прохождение воинской службы, сведения о воинском учете (когда, где, род войск): <strong>{{ $military }}</strong><br>
      Суммарный месячный доход на последнем месте работы: <strong>{{ $salary_last }}</strong><br>
    </p>
</div>
<!--=== End Content ===-->
</body>
</html>