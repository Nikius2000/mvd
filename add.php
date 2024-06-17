<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>МВД - Ввод</title>
</head>
<body>

    <div class="_header">
        <!-- Шапка -->
        <div class="_head">
            <div class="_content">
                <img src="logomvd.png"/>
                <div class="_text">
                    <span style="font-size: 24px;">МВД России</span>
                    <span style="font-size: 18px;">Личные дела сотрудников</span>
                </div>
            </div>
        </div>
        <!-- Навигация -->
        <div class="_nav">
            <div class="_content">
                <a href="/" class="_nv">
                    <img src="img/search.png" />
                    <span>Поиск</span>
                </a>
                <a href="add.html" class="_nv">
                    <img src="img/add.png" />
                    <span>Ввод</span>
                </a>
            </div>
        </div>

    </div>

    <div class="_main">
        <div class="_content">
            <span class="_htext">Ввод</span>
            <div class="_block">

                <div class="_inputs">
                    <div class="_input_block">
                        <span>Номер фонда <span style="color:red;">*</span></span>
                        <input class="_input" type="number" required placeholder="0"/>
                    </div>
                    <div class="_input_block">
                        <span>Номер описи <span style="color:red;">*</span></span>
                        <input class="_input" type="number" required placeholder="0"/>
                    </div>
                    <div class="_input_block">
                        <span>Номер дела <span style="color:red;">*</span></span>
                        <input class="_input" type="number" required placeholder="0"/>
                    </div>
                    <div class="_input_block">
                        <span>Номер дела (старый)</span>
                        <input class="_input" type="number" placeholder="0"/>
                    </div>
                    <div class="_input_block">
                        <span>Коробка числовое поле <span style="color:red;">*</span></span>
                        <input class="_input" type="number" required placeholder="0"/>
                    </div>
                    <div class="_input_block">
                        <span>Фамилия <span style="color:red;">*</span></span>
                        <input class="_input" type="text" required placeholder="Введите фамилию"/>
                    </div>
                    <div class="_input_block">
                        <span>Имя <span style="color:red;">*</span></span>
                        <input class="_input" type="text" required placeholder="Введите имя"/>
                    </div>
                    <div class="_input_block">
                        <span>Отчество</span>
                        <input class="_input" type="text" placeholder="Введите отчество"/>
                    </div>
                    <div class="_input_block">
                        <span>Дата рождения <span style="color:red;">*</span></span>
                        <input class="_input" type="date" required/>
                    </div>
                    <div class="_input_block">
                        <span>Место рождения <span style="color:red;">*</span></span>
                        <input class="_input" type="text" required placeholder="Введите место рождения"/>
                    </div>
                    <div class="_input_block">
                        <span>Количество листов <span style="color:red;">*</span></span>
                        <input class="_input" type="number" required placeholder="0"/>
                    </div>
                    <div class="_input_block">
                        <span>Категория сотрудника</span>

                        <select class="_input">
                            <option value="">--Выберите категорию--</option>
                            <option value="ct1">Категория 1</option>
                            <option value="ct2">Категория 2</option>
                        </select>
                    </div>
                    <div class="_input_block">
                        <span>Примечание</span>
                        <input class="_input" type="text" />
                    </div>
                </div>
                <button class="_btn _btn-blue">Добавить</button>
            </div>  
        </div>
    </div>

    <div class="_footer">
        <div class="_h-footer">
            <div class="_content">
                <div class="_col">
                    <span class="_a">ОПРОСЫ</span>
                    <span class="_b">Какие сервисы прежде всего важны для организации внутренней работы министерства?</span>
                    <a class="_href">Пройти опрос</a>
                </div>
                <div class="_col">
                    <span class="_a">СПРАВОЧНАЯ ИНФОРМАЦИЯ</span>
                    <a class="_href">Описание проекта</a>
                </div>
            </div>
        </div>
        <div class="_d-footer">
            <div class="_content">
                <div class="_col">
                    <span>Министерство внутренних дел Российской Федерации, 2015 г.</span>
                    <a>Обратная связь с руководством</a>
                </div>
                <div class="_col" style="justify-content: end;">
                    <span>Круглосуточная служба поддержки:</span>
                    <span>8 (800) 2000-462, 8 (495) 667-67-17</span>
                </div>
            </div>
        </div>
    </div>
    
    <script src="index.js"></script>
</body>
</html>