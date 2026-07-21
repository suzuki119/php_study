    </main>
    <footer class="site-footer">© NUTS SHOP</footer>
    <script>
        const countInput = document.getElementById('count');
        const countText = document.getElementById('count_text');

        function updateCountText(value) {
            if (countText) countText.value = value;
        }

        if (countInput && countText) {
            countInput.addEventListener('input', function() {
                updateCountText(this.value);
            });
            countText.addEventListener('input', function() {
                countInput.value = this.value;
            });
        }
    </script>
</body>

</html>
