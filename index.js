function getDataFromAPI() {
    $.ajax({
        url: 'api/emp_categ.php',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            if (data && data.length > 0) {
                $('._ccateg').empty();

                $('._ccateg').append('<option value="">--Выберите категорию--</option>');
                data.forEach(function(item) {
                    $('._ccateg').append('<option value="' + item[0] + '">' + item[1] + '</option>');
                });
            } else {
                $('._ccateg').html('Данные не найдены');
            }
            console.log('Категории загружены');
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log('Ошибка запроса:', errorThrown);
        }
    });
}

getDataFromAPI();

function getLdList() {
    $.ajax({
        url: 'api/ld.php',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            if (data && data.length > 0) {
                $('._list_ld').empty();

                // Append table header
                $('._list_ld').append(`
                    <tr>
                        <th># Ф</th>
                        <th># О</th>
                        <th># Д</th>
                        <th>№ Д(С)</th>
                        <th>КЧС</th>
                        <th>Ф</th>
                        <th>И</th>
                        <th>О</th>
                        <th>ДР</th>
                        <th>МР</th>
                        <th>КЛ</th>
                        <th>КС</th>
                        <th>ПРИМ</th>
                    </tr>
                `);

                // Append table rows with data
                data.forEach(function(item) {
                    $('._list_ld').append(`
                        <tr class="_ld_content" value="${item[0]}">
                            <td>${item[0]}</td>
                            <td>${item[1]}</td>
                            <td>${item[2]}</td>
                            <td>${item[3]}</td>
                            <td>${item[4]}</td>
                            <td>${item[5]}</td>
                            <td>${item[6]}</td>
                            <td>${item[7]}</td>
                            <td>${item[8]}</td>
                            <td>${item[9]}</td>
                            <td>${item[10]}</td>
                            <td>${item[11]}</td>
                            <td>${item[12]}</td>
                        </tr>
                    `);
                });
                console.log('Данные успешно загружены');
            } else {
                $('._list_ld').html('Данные не найдены');
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Ошибка запроса:', errorThrown);
        }
    });
}

function getEmpCategList() {
    $.ajax({
        url: 'api/emp_categ.php',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            if (data && data.length > 0) {
                $('._list_emp_categ').empty();

                // Append table header
                $('._list_emp_categ').append(`
                    <tr>
                        <th>Айди</th>
                        <th>Название</th>
                    </tr>
                `);

                // Append table rows with data
                data.forEach(function(item) {
                    $('._list_emp_categ').append(`
                        <tr class="_emp_categ_content" value="${item[0]}">
                            <td>${item[0]}</td>
                            <td>${item[1]}</td>
                        </tr>
                    `);
                });
                console.log('Данные успешно загружены');
            } else {
                $('._list_emp_categ').html('Данные не найдены');
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Ошибка запроса:', errorThrown);
        }
    });
}

function get_ld_by_id(fund_number){
    $.ajax({
        url: 'api/ld_by_id.php?fund_number=' + fund_number,
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            if (data && data.length > 0) {

                console.log(data[0]);
                
                $('#modalValue').empty();

                $('#modalValue').append(`
                    
                    <div class="_block">
                        <div class="_inputs _edit" style="grid-template-columns: 1fr 1fr;">
                                <div class="_input_block">
                                    <span>Номер фонда</span>
                                    <input class="_input" name="fund_number" type="number" placeholder="0" readonly value="${data[0].fund_number}" />
                                </div>
                                <div class="_input_block">
                                    <span>Номер описи</span>
                                    <input class="_input" name="inventory_number" type="number" placeholder="0" value="${data[0].inventory_number}"/>
                                </div>
                                <div class="_input_block">
                                    <span>Номер дела</span>
                                    <input class="_input" name="case_number" type="number" placeholder="0" value="${data[0].case_number}"/>
                                </div>
                                <div class="_input_block">
                                    <span>Номер дела (старый)</span>
                                    <input class="_input" name="case_number_old" type="number" placeholder="0" value="${data[0].case_number_old}"/>
                                </div>
                                <div class="_input_block">
                                    <span>Коробка числовое поле</span>
                                    <input class="_input" name="box_is_numeric_field" type="number" placeholder="0" value="${data[0].box_is_numeric_field}"/>
                                </div>
                                <div class="_input_block">
                                    <span>Фамилия</span>
                                    <input class="_input" name="f" type="text" placeholder="Введите фамилию" value="${data[0].f}"/>
                                </div>
                                <div class="_input_block">
                                    <span>Имя</span>
                                    <input class="_input" name="i" type="text" placeholder="Введите имя" value="${data[0].i}"/>
                                </div>
                                <div class="_input_block">
                                    <span>Отчество</span>
                                    <input class="_input" name="o" type="text" placeholder="Введите отчество" value="${data[0].o}"/>
                                </div>
                                <div class="_input_block">
                                    <span>Дата рождения</span>
                                    <input class="_input" name="date_of_birth" type="date" value="${data[0].date_of_birth}"/>
                                </div>
                                <div class="_input_block">
                                    <span>Место рождения</span>
                                    <input class="_input" name="place_of_birth" type="text" placeholder="Введите место рождения" value="${data[0].place_of_birth}"/>
                                </div>
                                <div class="_input_block">
                                    <span>Количество листов</span>
                                    <input class="_input" name="number_of_sheets" type="number" value="${data[0].number_of_sheets}"/>
                                </div>
                                <div class="_input_block">
                                    <span>Категория сотрудника</span>
                                    <input class="_input" name="employee_category" type="number" value="${data[0].employee_category}"/>
                                </div>
                                <div class="_input_block">
                                    <span>Примечание</span>
                                    <input class="_input" name="note" type="number" value="${data[0].note}"/>
                                </div>
                            </div>
                            <div style="margin-top: 10px;">
                                <button class="_btn _btn-blue _edit_ld_btn">Сохранить</button>
                                <button class="_btn _btn-red _del_ld_btn">Удалить</button>
                            </div>
                        </div>
                    </div>
                    
                    `);
            } else {
                $('.modalValue').html('Данные не найдены');
                console.log('Данные не найдены');
            }
            console.log('Категории загружены');
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log('Ошибка запроса:', errorThrown);
        }
    });
}

function get_emp_categ_by_id(id){
    $.ajax({
        url: 'api/emp_categ_by_id.php?id=' + id,
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            if (data && data.length > 0) {

                console.log(data[0]);
                
                $('#modalValue').empty();

                $('#modalValue').append(`
                    
                    <div class="_block">
                        <div class="_inputs _edit" style="grid-template-columns: 1fr 1fr;">
                                <div class="_input_block">
                                    <span>Номер фонда</span>
                                    <input class="_input" name="id" type="number" placeholder="0" readonly value="${data[0].id}" />
                                </div>
                                <div class="_input_block">
                                    <span>Номер описи</span>
                                    <input class="_input" name="text" type="text" placeholder="0" value="${data[0].text}"/>
                                </div>
                            </div>
                            <div style="margin-top: 10px;">
                                <button class="_btn _btn-blue _edit_emp_categ_btn">Сохранить</button>
                                <button class="_btn _btn-red _del_emp_categ_btn">Удалить</button>
                            </div>
                        </div>
                    </div>
                    
                    `);
            } else {
                $('.modalValue').html('Данные не найдены');
                console.log('Данные не найдены');
            }
            console.log('Категории загружены');
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log('Ошибка запроса:', errorThrown);
        }
    });
}

$('body').on('click', '._ld_content', function() {
    let itemValue = $(this).attr('value');
    $('.modal-title').text(`РЕДАКТИРОВАНИЕ (${itemValue})`);
    get_ld_by_id(itemValue);
    $(".modal-overlay, #myModal").fadeIn();
});

$('body').on('click', '._emp_categ_content', function() {
    let itemValue = $(this).attr('value');
    $('.modal-title').text(`РЕДАКТИРОВАНИЕ (${itemValue})`);
    get_emp_categ_by_id(itemValue);
    $(".modal-overlay, #myModal").fadeIn();
});

$(".modal-close, .modal-overlay").click(function(){
    $(".modal-overlay, #myModal").fadeOut();
});

$('body').on('click', '._edit_ld_btn', function() {
    var updatedLdData = {};

    $('._edit ._input').each(function() {
        var inputName = $(this).attr('name');
        var inputValue = $(this).val();
        updatedLdData[inputName] = inputValue;
    });

    $.ajax({
        url: 'api/ld_edit.php',
        type: 'POST',
        dataType: 'json',
        contentType: 'application/json',
        data: JSON.stringify(updatedLdData),
        success: function(response) {
            if (response.message) {
                toastr["success"](response.message, "Успех!");
                $('#myModal').fadeOut(); // Закрыть модальное окно после успешного сохранения
            } else if (response.error) {
                toastr["error"](response.error, "Ошибка!");
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Ошибка запроса:', errorThrown);
            toastr["error"]("Произошла ошибка при обновлении данных.", "Ошибка!");
        }
    });
});

$('body').on('click', '._edit_emp_categ_btn', function() {
    var updatedLdData = {};

    $('._edit ._input').each(function() {
        var inputName = $(this).attr('name');
        var inputValue = $(this).val();
        updatedLdData[inputName] = inputValue;
    });

    $.ajax({
        url: 'api/emp_categ_edit.php',
        type: 'POST',
        dataType: 'json',
        contentType: 'application/json',
        data: JSON.stringify(updatedLdData),
        success: function(response) {
            if (response.message) {
                toastr["success"](response.message, "Успех!");
                $('#myModal').fadeOut(); // Закрыть модальное окно после успешного сохранения
            } else if (response.error) {
                toastr["error"](response.error, "Ошибка!");
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Ошибка запроса:', errorThrown);
            toastr["error"]("Произошла ошибка при обновлении данных.", "Ошибка!");
        }
    });
});

$('body').on('click', '._del_ld_btn', function() {
    let fundNumber = $(this).closest('._block').find('input[name="fund_number"]').val();
    
    $.ajax({
        url: 'api/ld_del.php',
        type: 'POST',
        contentType: 'application/json', // Указываем тип контента как JSON
        dataType: 'json',
        data: JSON.stringify({ fund_number: fundNumber }), // Преобразуем объект в JSON-строку
        success: function(response) {
            if (response.message) {
                toastr["success"](response.message, "Успех!");
                $('#myModal').fadeOut(); // Закрываем модальное окно после успешного удаления
            } else if (response.error) {
                toastr["error"](response.error, "Ошибка!");
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Ошибка запроса:', errorThrown);
            toastr["error"]("Произошла ошибка при удалении данных.", "Ошибка!");
        }
    });
});

$('body').on('click', '._del_emp_categ_btn', function() {
    let id = $(this).closest('._block').find('input[name="id"]').val();
    
    $.ajax({
        url: 'api/emp_categ_del.php',
        type: 'POST',
        contentType: 'application/json', // Указываем тип контента как JSON
        dataType: 'json',
        data: JSON.stringify({ id: id }), // Преобразуем объект в JSON-строку
        success: function(response) {
            if (response.message) {
                toastr["success"](response.message, "Успех!");
                $('#myModal').fadeOut(); // Закрываем модальное окно после успешного удаления
            } else if (response.error) {
                toastr["error"](response.error, "Ошибка!");
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Ошибка запроса:', errorThrown);
            toastr["error"]("Произошла ошибка при удалении данных.", "Ошибка!");
        }
    });
});




$('._ld_btn_list').click(() => {
    var inputsData = {};
    var anyInputFilled = false;

    $('._search').each(function() {
        var inputName = $(this).attr('name');
        var inputValue = $(this).val();
        if (inputValue.trim() !== '') {
            anyInputFilled = true;
        }
        inputsData[inputName] = inputValue;
    });

    console.log(inputsData); // Debugging line to check input data

    if (anyInputFilled) {
        toastr["success"]("Данные с инпутом!", "Успех!");
        $.ajax({
            url: 'api/ld_search.php',
            type: 'POST',
            dataType: 'json',
            contentType: 'application/json',
            data: JSON.stringify(inputsData),
            success: function(data) {
                console.log(data); // Debugging line to check response data
                if (data && data.length > 0) {
                    $('._list_ld').empty();
                    $('._list_ld').append(`
                        <tr>
                            <th># Ф</th>
                            <th># О</th>
                            <th># Д</th>
                            <th>№ Д(С)</th>
                            <th>КЧС</th>
                            <th>Ф</th>
                            <th>И</th>
                            <th>О</th>
                            <th>ДР</th>
                            <th>МР</th>
                            <th>КЛ</th>
                            <th>КС</th>
                            <th>ПРИМ</th>
                        </tr>
                    `);

                    data.forEach(function(item) {
                        $('._list_ld').append(`
                            <tr class="_ld_content" value="${item.fund_number}">
                                <td>${item.fund_number}</td>
                                <td>${item.inventory_number}</td>
                                <td>${item.case_number}</td>
                                <td>${item.case_number_old}</td>
                                <td>${item.box_is_numeric_field}</td>
                                <td>${item.f}</td>
                                <td>${item.i}</td>
                                <td>${item.o}</td>
                                <td>${item.date_of_birth}</td>
                                <td>${item.place_of_birth}</td>
                                <td>${item.number_of_sheets}</td>
                                <td>${item.employee_category}</td>
                                <td>${item.note}</td>
                            </tr>
                        `);
                    });
                    console.log('Данные загружены успешно!');
                } else {
                    $('._list_ld').html('<tr><td colspan="13">Данные не найдены</td></tr>');
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Ошибка запроса:', errorThrown);
            }
        });
    } else {
        toastr["success"]("Данные получены!.", "Успех!");
        getLdList();
    }
});

$('._emp_categ_btn_list').click(() => {
    var inputsData = {};
    var anyInputFilled = false;

    $('._search').each(function() {
        var inputName = $(this).attr('name');
        var inputValue = $(this).val();
        if (inputValue.trim() !== '') {
            anyInputFilled = true;
        }
        inputsData[inputName] = inputValue;
    });

    console.log(inputsData); // Debugging line to check input data

    if (anyInputFilled) {
        toastr["success"]("Данные с инпутом!", "Успех!");
        $.ajax({
            url: 'api/emp_categ_search.php',
            type: 'POST',
            dataType: 'json',
            contentType: 'application/json',
            data: JSON.stringify(inputsData),
            success: function(data) {
                console.log(data); // Debugging line to check response data
                if (data && data.length > 0) {
                    $('._list_emp_categ').empty();
                    $('._list_emp_categ').append(`
                        <tr>
                            <th>Айди</th>
                            <th>Название</th>
                        </tr>
                    `);

                    data.forEach(function(item) {
                        $('._list_emp_categ').append(`
                            <tr class="_emp_categ_content" value="${item.id}">
                                <td>${item.id}</td>
                                <td>${item.text}</td>
                            </tr>
                        `);
                    });
                    console.log('Данные загружены успешно!');
                } else {
                    $('._list_emp_categ').html('<tr><td colspan="13">Данные не найдены</td></tr>');
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Ошибка запроса:', errorThrown);
            }
        });
    } else {
        toastr["success"]("Данные получены!.", "Успех!");
        getEmpCategList();
    }
});



$('._ld_btn_add').click(function(){
    var inputsData = [];
    var allInputsFilled = true;
    
    $('._input').each(function(){
        var inputValue = $(this).val();
        if(inputValue.trim() === '') {
            allInputsFilled = false;
            return false;
        }
        inputsData.push(inputValue);
    });
    
    if(allInputsFilled) {
        // Все поля заполнены, делаем AJAX запрос
        $.ajax({
            type: "POST",
            url: "api/ld_add.php",
            data: { inputData: inputsData },
            success: function(response) {
                if(response == 1){
                    console.log("Такой номер фонда уже существует!");
                    toastr["error"]("Такой номер фонда уже существует!", "Ошибка!");
                }else{
                    console.log("Сервер ответил: " + response);
                    toastr["success"]("Данные добавлены!", "Успех!");
                }
            },
            error: function(xhr, status, error) {
                toastr["error"]("Произошла ошибка при отправке данных", "Ошибка!");
                console.log("Ошибка при отправке данных: " + error);
            }
        });
    } else {
        toastr["error"]("Пустые поля не допустимы.", "Ошибка!");
    }
});

$('._emp_categ_btn_add').click(function(){
    var inputsData = [];
    var allInputsFilled = true;
    
    $('._input').each(function(){
        var inputValue = $(this).val();
        if(inputValue.trim() === '') {
            allInputsFilled = false;
            return false;
        }
        inputsData.push(inputValue);
    });
    
    if(allInputsFilled) {
        // Все поля заполнены, делаем AJAX запрос
        $.ajax({
            type: "POST",
            url: "api/emp_categ_add.php",
            data: { inputData: inputsData },
            success: function(response) {
                if(response == 1){
                    console.log("Такой номер фонда уже существует!");
                    toastr["error"]("Такой номер фонда уже существует!", "Ошибка!");
                }else{
                    console.log("Сервер ответил: " + response);
                    toastr["success"]("Данные добавлены!", "Успех!");
                }
            },
            error: function(xhr, status, error) {
                toastr["error"]("Произошла ошибка при отправке данных", "Ошибка!");
                console.log("Ошибка при отправке данных: " + error);
            }
        });
    } else {
        toastr["error"]("Пустые поля не допустимы.", "Ошибка!");
    }
});

toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-bottom-full-width",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "700",
  "hideDuration": "700",
  "timeOut": "1500",
  "extendedTimeOut": "1500",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}