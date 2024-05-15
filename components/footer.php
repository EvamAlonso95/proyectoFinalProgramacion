<script>
	const dropdownElementList = document.querySelectorAll('.dropdown-toggle')
	console.log(dropdownElementList);
const dropdownList = [...dropdownElementList].map(dropdownToggleEl => new bootstrap.Dropdown(dropdownToggleEl))
</script>
</body>

</html>

<?php $db->closeConnection();