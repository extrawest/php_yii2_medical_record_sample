<aside class="main-sidebar">

    <section class="sidebar">

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Dictionaries', 'options' => ['class' => 'header']],
                    ['label' => 'Medical Records', 'icon' => 'address-card', 'url' => ['/patients']],
                    ['label' => 'System', 'options' => ['class' => 'header']],
                    ['label' => 'Managers', 'icon' => 'user-md', 'url' => ['/managers']],
                ],
            ]
        ) ?>

    </section>

</aside>
