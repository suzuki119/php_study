<script>
    const countInput = document.getElementById('count');
    const countText = document.getElementById('count_text');

    function updateCountText(value) {
        countText.value = value;
    }
    countInput.addEventListener('input', function() {
        updateCountText(this.value);
    });
    countText.addEventListener('input', function() {
        countInput.value = this.value;
    });
</script>
</body>

</html>