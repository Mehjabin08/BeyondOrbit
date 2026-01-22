</main>



<script src="js/auth.js"></script>
<?php if(isset($_SESSION['user_role'])): ?>
    <?php if($_SESSION['user_role'] === 'director'): ?>
        <script src="js/admin.js"></script>
    <?php elseif($_SESSION['user_role'] === 'astronaut'): ?>
        <script src="js/astronaut.js"></script>
    <?php endif; ?>
<?php endif; ?>
</body>
</html>
