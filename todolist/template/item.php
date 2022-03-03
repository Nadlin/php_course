<div id="<?= $item['id'] ?>" class="elem" data-priority="<?= $item['priority'] ?>" data-termination="<?= $item['date'] ?>">
    <span class="task-i"><?= $item['task'] ?></span>
    <div class="notes"><?= $item['comment'] ?></div>
    <div class="termination"><?= $item['date'] ?></div>
    <div class="exit" title="Удалить задачу"></div>
    <div class="edit" title="Редактировать задачу"></div>
    <input class="star" id="st-<?= $item['id'] ?>" type="checkbox">
    <label for="st-<?= $item['id'] ?>"></label>
    <div class="done" title="Отметить как выполнена"></div>
    <div class="important <?= $item['priority'] ?>"></div>
</div>