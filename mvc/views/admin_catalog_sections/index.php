<?php require_once $_SERVER ['DOCUMENT_ROOT'] . '/views/header.php';?>
<!--    <div id="wrap">-->
<!--        <div class="container">-->
<!--            <div class="row">-->
<!--                <form class="form-horizontal" action="functions.php" method="post" name="upload_excel" enctype="multipart/form-data">-->
<!--                    <fieldset>-->
<!--                        Form Name -->
<!--                        <legend>Form Name</legend>-->
<!--                       File Button -->
<!--                        <div class="form-group">-->
<!--                            <label class="col-md-4 control-label" for="filebutton">Select File</label>-->
<!--                            <div class="col-md-4">-->
<!--                                <input type="file" name="file" id="file" class="input-large">-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        Button -->
<!--                        <div class="form-group">-->
<!--                            <label class="col-md-4 control-label" for="singlebutton">Import data</label>-->
<!--                            <div class="col-md-4">-->
<!--                                <button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Import</button>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </fieldset>-->
<!--                </form>-->
<!--            </div>-->
<!--            --><?php
//            get_all_records();
//            ?>
<!--        </div>-->
<!--    </div>-->
<!--    <div>-->
<!--        <form class="form-horizontal" action="functions.php" method="post" name="upload_excel"-->
<!--              enctype="multipart/form-data">-->
<!--            <div class="form-group">-->
<!--                <div class="col-md-4 col-md-offset-4">-->
<!--                    <input type="submit" name="Export" class="btn btn-success" value="export to excel"/>-->
<!--                </div>-->
<!--            </div>-->
<!--        </form>-->
<!--    </div>-->

<div class="h2 px-2" >
    ???????????????????? ??????????????????????
</div>
<div id="container_table_sections_list">
    <table class="table table-striped" id="table_sections_list">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">??????</th>
            <th scope="col">??????</th>
            <th scope="col">??????????????</th>
            <th scope="col">??????-???? ????????????????????????</th>
            <th scope="col">???????????????????????? ??????????????????</th>
            <th scope="col">????????????????</th>
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
                    <button type="button" class="btn btn-primary btn-sm" onclick="show_modal_edit_section(<?=$section['id'] ?>)">????????????????</button>
                    <? if (! ($section['count_sections'] > 0) ) : ?>
                        <button type="button" class="btn btn-danger btn-sm" onclick="section_del(<?=$section['id'] ?>)" >??????????????</button>
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
            ???????????????? ??????????????????
        </button>
    </div>
</row>
<!-- Modal New Section -->
    <div class="modal fade" id="new_section_modal" tabindex="-1" aria-labelledby="new_section_modal_title" aria-hidden="true">
        <div class="modal-dialog modal-dialogcentered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="new_section_modal_title">???????????????????? ??????????????????</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger error_danger d-none" role="alert">
                        ?????????????????? ????????????!
                    </div>
                    <div class="mx-auto">
                        <form id="form_new_section" method="post" action="/admin_catalog_sections/add/">
                            <div class="form-group">
                                <label for="section_name">???????????????? ??????????????????</label>
                                <input type="text" required="required" class="form-control" name="section_name" id="section_name" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="section_code">?????? ??????????????????</label>
                                <input type="text" class="form-control" required="required" name="section_code" id="section_code" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="parent_section">???????????????????????? ??????????????????</label>
                                <select class="form-control" name="parent_section" id="parent_section">
                                    <option value="0" data-dept-level='-1'>.</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="add_new_section" onclick="add_new_section()">????????????????</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Edit Section -->
    <div class="modal fade" id="edit_section_modal" tabindex="-1" aria-labelledby="edit_section_modal_title" aria-hidden="true">
        <div class="modal-dialog modal-dialogcentered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit_section_modal_title">???????????????????? ??????????????????</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger error_danger d-none" role="alert">
                        ?????????????????? ????????????!
                    </div>
                    <div class="mx-auto">
                        <form id="form_new_section" method="post" action="/admin_catalog_sections/edit/">
                            <input type="hidden" name="section_id" value="">
                            <div>
                                ???????????????? ID = <span class="edit_id"></span>
                            </div>
                            <div class="form-group">
                                <label for="section_name">???????????????? ??????????????????</label>
                                <input type="text" required="required" class="form-control" name="section_name" id="section_name" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="section_code">?????? ??????????????????</label>
                                <input type="text" class="form-control" required="required" name="section_code" id="section_code" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="parent_section">???????????????????????? ??????????????????</label>
                                <select class="form-control" name="parent_section" id="parent_section">
                                    <option value="0" data-dept-level='-1'>.</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="add_new_section" onclick="edit_section()">????????????????</button>
                </div>
            </div>
        </div>
    </div>

<?php require_once $_SERVER ['DOCUMENT_ROOT'].'/views/footer.php';?>