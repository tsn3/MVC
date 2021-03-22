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
            <td><?=$section['count_sections']?></td>
            <td><?=$section['dept_level']?></td>
            <td><?=$section['parent_id']?></td>
            <td class="text-end">
                <button type="button" class="btn btn-primary btn-sm" onclick="show_modal_edit_section(<?=$section['id'] ?>)">Изменить</button>
                <? if (! ($section['count_sections'] > 0) ) : ?>
                    <button type="button" class="btn btn-danger btn-sm" onclick="section_del(<?=$section['id']?>)" >Удалить</button>
                <?endif?>
            </td>
        </tr>
    <?endforeach;?>
    </tbody>
</table>