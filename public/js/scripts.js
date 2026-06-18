/*!
* Start Bootstrap - Blog Post v5.0.9 (https://startbootstrap.com/template/blog-post)
* Copyright 2013-2023 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-blog-post/blob/master/LICENSE)
*/
// This file is intentionally blank
// Use this file to add JavaScript to your project

document.addEventListener("DOMContentLoaded", function () {
	var commentSections = document.querySelectorAll(".comments_section");
	var toggleButtons = document.querySelectorAll(".toggle_comments");

	commentSections.forEach(function (section) {
		section.classList.add("d-none");
	});

	toggleButtons.forEach(function (button) {
		button.addEventListener("click", function () {
			var targetSection = button.nextElementSibling;

			while (targetSection && !targetSection.classList.contains("comments_section")) {
				targetSection = targetSection.nextElementSibling;
			}

			if (targetSection) {
				targetSection.classList.toggle("d-none");
			}
		});
	});
});