<?php require_once $_SERVER ['DOCUMENT_ROOT'].'/views/header.php';?>

<div class="h2 px-2" >
    Управление категориями
</div>
<div id="container_table_sections_list">

    <table class="table table-striped" id="table_sections_list">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Имя</th>
            <th scope="col">Код</th>
            <th scope="col">Уровень</th>
            <th scope="col">Кол-во подкатегорий</th>
            <th scope="col">Родительская категория</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>
        <? foreach ($this->sections_list as $section):?>
            <tr data-id='<?=$section['id']?>'>
                <th scope="row"><?=$section['id']?></th>
                <td><?=$section['name']?></td>
                <td><?=$section['code']?></td>
                <td><?=$section['dept_level']?></td>
                <td><?=$section['count_sections']?></td>
                <td><?=$section['parent_id']?></td>
                <td class="text-end">
                    <button type="button" class="btn btn-primary btn-sm" onclick="show_modal_edit_section(<?=$section['id'] ?>)">Изменить</button>
                    <? if (! ($section['count_sections'] > 0) ) : ?>
                        <button type="button" class="btn btn-danger btn-sm" onclick="section_del(<?=$section['id'] ?>)" >Удалить</button>
                    <?endif?>
                </td>
            </tr>
        <?endforeach;?>
        </tbody>
    </table>

</div>
<br/>
<br/>
<row>
    <div class="col-md-12 text-end">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#new_section_modal">
            Добавить категории
        </button>
    </div>
</row>

<!-- Modal New Section -->
    <div class="modal fade" id="new_section_modal" tabindex="-1" aria-labelledby="new_section_modal_title" aria-hidden="true">
        <div class="modal-dialog modal-dialogcentered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="new_section_modal_title">Добавление категории</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger error_danger d-none" role="alert">
                        Произошла ошибка!
                    </div>
                    <div class="mx-auto">
                        <form id="form_new_section" method="post" action="/admin_catalog_sections/add/">
                            <div class="form-group">
                                <label for="section_name">Название категории</label>
                                <input type="text" required="required" class="form-control" name="section_name" id="section_name" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="section_code">Код категории</label>
                                <input type="text" class="form-control" required="required" name="section_code" id="section_code" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="parent_section">Родительская категория</label>
                                <select class="form-control" name="parent_section" id="parent_section">
                                    <option value="0" data-dept-level='-1'>.</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="add_new_section" onclick="add_new_section()">Добавить</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Section -->
    <div class="modal fade" id="edit_section_modal" tabindex="-1" aria-labelledby="edit_section_modal_title" aria-hidden="true">
        <div class="modal-dialog modal-dialogcentered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit_section_modal_title">Добавление категории</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger error_danger d-none" role="alert">
                        Произошла ошибка!
                    </div>
                    <div class="mx-auto">
                        <form id="form_new_section" method="post" action="/admin_catalog_sections/edit/">
                            <input type="hidden" name="section_id" value="">
                            <div>
                                Изменяем ID = <span class="edit_id"></span>
                            </div>
                            <div class="form-group">
                                <label for="section_name">Название категории</label>
                                <input type="text" required="required" class="form-control" name="section_name" id="section_name" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="section_code">Код категории</label>
                                <input type="text" class="form-control" required="required" name="section_code" id="section_code" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="parent_section">Родительская категория</label>
                                <select class="form-control" name="parent_section" id="parent_section">
                                    <option value="0" data-dept-level='-1'>.</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="add_new_section" onclick="edit_section()">Изменить</button>
                </div>
            </div>
        </div>
    </div>

<?php require_once $_SERVER ['DOCUMENT_ROOT'].'/views/footer.php';?>