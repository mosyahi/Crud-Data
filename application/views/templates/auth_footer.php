</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
	$(document).ready(function() {
		var $table = $('.table');
		var $tbody = $table.find('tbody');
		var $rows = $tbody.find('tr');
		var totalItems = $rows.length;
		var itemsPerPage = 5; 
		var currentPage = 1;

		function showPage(page) {
			$rows.hide();
			var startIndex = (page - 1) * itemsPerPage;
			var endIndex = startIndex + itemsPerPage;
			$rows.slice(startIndex, endIndex).show();
		}

		showPage(currentPage);

		$('#items-per-page').on('change', function() {
			itemsPerPage = parseInt($(this).val());
			currentPage = 1; 
			showPage(currentPage);
			createPaginationItems();
		});

		function calculateTotalPages() {
			return Math.ceil(totalItems / itemsPerPage);
		}

		function createPaginationItems() {
			var totalPages = calculateTotalPages();
			var $pagination = $('.pagination');
			$pagination.empty(); 

			$pagination.append('<li class="page-item"><a class="page-link prev" href="#">Previous</a></li>');

			for (var i = 1; i <= totalPages; i++) {
				var pageClass = (i === currentPage) ? 'active' : '';
				$pagination.append('<li class="page-item ' + pageClass + '"><a class="page-link" href="#">' + i + '</a></li>');
			}

			$pagination.append('<li class="page-item"><a class="page-link next" href="#">Next</a></li>');
		}

		createPaginationItems();

		$('.pagination').on('click', 'a', function(e) {
			e.preventDefault();
			var $this = $(this);
			if ($this.hasClass('prev')) {
				if (currentPage > 1) {
					currentPage--;
				}
			} else if ($this.hasClass('next')) {
				if (currentPage < calculateTotalPages()) {
					currentPage++;
				}
			} else {
				currentPage = parseInt($this.text());
			}
			showPage(currentPage);
			createPaginationItems();
		});
	});

</script>
</html>