(function () {
	var App = $class({
		constructor:function () {
			var body = $('body');

			this.apply();
			body.ajaxComplete(callback(this, 'apply'));

			// ajax links
			body.delegate('a.ajax', 'click', function (event) {
				$.get($(this).attr('href'));
				event.stopPropagation();
				event.preventDefault();
				return false;
			});
		},
		apply:function () {
			this.dates();
			this.links();
		},
		dates:function () {
			$('input[date]').datepicker();
		},
		links:function () {
			var emptyAnchors = $('a[href="#"]');
			emptyAnchors.unbind('click');
			emptyAnchors.click(function (e) {
				return false;
			});
		}
	});

	$(document).ready(function () {
		new App();
	});
})();

