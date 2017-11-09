        </div>
        <script>
            years();
            months();
            days(0);
            <?= isset($formInvalid) ? 'howManyDays();' : ''; ?>
        </script>
    </body>
</html>
