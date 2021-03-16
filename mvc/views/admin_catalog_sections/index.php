<?php require_once $_SERVER ['DOCUMENT_ROOT'].'/views/header.php';?>

<div class="h2 px-2" >
    Управление категориями
</div>

<br/>
<br/>
<row>
    <div class="col-md-12 text-right">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#new_section_modal">
            Добавить категории
        </button>
    </div>
</row>

    <div class="modal fade" id="new_section_modal" tabindex="-1" aria-labelledby="new_section_modal_title" aria-hidden="true">
        <div class="modal-dialog modal-dialogcentered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="new_section_modal_title">Добавление категории</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
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
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
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

<?php require_once $_SERVER ['DOCUMENT_ROOT'].'/views/footer.php';?>