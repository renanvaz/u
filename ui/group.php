<article class="container-test <?php echo $reports['status'] ? '' : 'open'; ?>">
    <header>
        <span class="fa <?php echo $reports['status'] ? 'fa-check green' : 'fa-times red'; ?>"></span>
        <?php echo isset($reports['description']) ? '<h1>'.$reports['description'].'</h1>' : '' ?>
        <a class="fa fa-plus right gray"></a>
    </header>
    <section class="content">
        <?php foreach($reports['reports'] as $report): ?>
            <?php if (isset($report['reports'])): ?>
                <?php echo UCore::view('ui/group.php', ['reports' => $report]); ?>
            <?php else: ?>
                <div>
                    <span class="fa <?php echo $report['status'] ? 'fa-check green' : 'fa-times red'; ?>"></span> <?php echo $report['description']; ?>
                    <?php if (!$report['status']): ?>
                        <div class="snippet"><?php echo UCore::getSnippet($report['trace']['file'], $report['trace']['line']); ?></div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </section>
</article>
