"use strict";

$(function () {

	// Side nav submenu
	if ($('.side-nav').length) {
		$('.side-nav').find('.main-menu').find('a').each(function() {
			if ($(this).parent().find('ul').length > 0) {
				$(this).attr('href', 'javascript:;')
			}

			$(this).on('click', function() {
				var li = $(this).parent()
				if ($(li).parent().parent().hasClass('main-menu')) {
					if (!$(li).hasClass('active')) {
						$('.side-nav').find('.main-menu > ul > li').removeClass('active')
						$(li).addClass('active')
					} else {
						$(li).removeClass('active')
					}
				}
			})
		})
	}

	// Mobile nav
	if ($('.mobile-nav').length) {
		$('.mobile-nav').on('click', function() {
			if (!$('.side-nav').find('.user-side-profile').is(':visible')) {
				$('.side-nav').css('min-height', '1000px')
				$('.side-nav').find('.side-notification').fadeIn().css('display', 'flex')
				$('.side-nav').find('.user-side-profile').fadeIn().css('display', 'flex')
				$('.side-nav').find('.main-menu-title').fadeIn()
				$('.side-nav').find('.main-menu').fadeIn()
				$('.main').css({
					'height': $('.side-nav').height() + 'px',
					'overflow': 'hidden'
				})
			} else {
				$('.side-nav').css('min-height', 'auto')
				$('.side-nav').find('.side-notification').hide().removeAttr("style")
				$('.side-nav').find('.user-side-profile').hide().removeAttr("style")
				$('.side-nav').find('.main-menu-title').hide().removeAttr("style")
				$('.side-nav').find('.main-menu').hide().removeAttr("style")
				$('.main').css({
					'height': 'auto',
					'overflow': 'auto'
				})
			}
		})
	}

	// On window resized
	$(window).resize(function() {
		if ($(window).width() > 768) {
			$('.side-nav').find('.side-notification').removeAttr("style")
			$('.side-nav').find('.user-side-profile').removeAttr("style")
			$('.side-nav').find('.main-menu-title').removeAttr("style")
			$('.side-nav').find('.main-menu').removeAttr("style")
		} else {
			$('.side-nav').css('min-height', 'auto')
		}
	})

	// Profile menu
	if ($('.user-side-profile').length) {
		$('.user-side-profile').on('click', function() {
			if ($(this).find('.user-side-menu').hasClass('active')) {
				$(this).find('.user-side-menu').removeClass('active')
			} else {
				$(this).find('.user-side-menu').addClass('active')
			}
		})
	}

	// Side notification
	if ($('.side-notification').length) {
		$('.side-notification').find('.notification-icon').each(function() {
			var notification_icon = this;
			$(notification_icon).on('click', function() {
				var show = $(notification_icon).find('.notification-wrapper').hasClass('active')
				$('.notification-wrapper').removeClass('active')

				if (!show) {
					$(notification_icon).find('.notification-wrapper').addClass('active')
				} else {
					$(notification_icon).find('.notification-wrapper').removeClass('active')
				}
			})
		})
	}

	// Slide item
	if ($('.slide-item').length && $('.slide-item').children().length > 1) {
		(function slide_item() {
			$('.slide-item').css('overflow', 'hidden')
			$('.slide-item').height($('.slide-item').height())
			var margin_top = $('.slide-item').children().first().css('margin-top')
			var item_height = $('.slide-item').children().first().height()
			$('.slide-item').children().first().animate({
				'margin-top': '-' + item_height
			}, 1000, function() {
				var item = $('.slide-item').children().first().clone().css({
					'margin-top': margin_top,
					'display': 'none'
				})
				$('.slide-item').children().first().remove()
				$('.slide-item').append(item)
				$(item).fadeIn()
				setTimeout(function() {
					slide_item()
				}, 5000)
			})
		}())
	}

	// Calendar
	if ($('#full-calendar').length) {
		var calendar, d, date, m, y;
		date = new Date();
		d = date.getDate();
		m = date.getMonth();
		y = date.getFullYear();

		calendar = $("#full-calendar").fullCalendar({
			header: {
				left: "prev,next today",
				center: "title",
				right: "month,agendaWeek,agendaDay"
			},
			selectable: true,
			selectHelper: true,
			select: function select(start, end, allDay) {
				var title;
				title = prompt("Event Title:");
				if (title) {
					calendar.fullCalendar("renderEvent", {
						title: title,
						start: start,
						end: end,
						allDay: allDay
					}, true);
				}
				return calendar.fullCalendar("unselect");
			},
			editable: true,
			events: [{
				title: "Long Event",
				start: new Date(y, m, 3, 12, 0),
				end: new Date(y, m, 7, 14, 0)
			}, {
				title: "Lunch",
				start: new Date(y, m, d, 12, 0),
				end: new Date(y, m, d + 2, 14, 0),
				allDay: false
			}, {
				title: "Click for Google",
				start: new Date(y, m, 28),
				end: new Date(y, m, 29),
				url: "http://google.com/"
			}]
		});
	}

	// Donut chart
	if ($('#donut-chart').length) {
		var donutChart = $("#donut-chart");
		var data = {
			labels: ["Red", "Yellow", "Green", "Blue"],
			datasets: [{
				data: [80, 120, 80, 50],
				backgroundColor: ["#ff4141", "#FBC02D", "#71c21a", "#5797fc"],
				hoverBackgroundColor: ["#ff5c5c", "#fdcd54", "#89da32", "#6ca4fb"],
				borderWidth: 0
			}]
		};

		new Chart(donutChart, {
			type: 'doughnut',
			data: data,
			options: {
				legend: {
					display: false
				},
				animation: {
					animateScale: true
				},
				cutoutPercentage: 80
			}
		});
	}

	// Line chart 
	if ($('#line-chart').length) {
		var lineChart = $("#line-chart");
		var lineData = {
			labels: ["10", "20", "30", "40", "50", "60", "70"],
			datasets: [{
				label: "Visitors Graph",
				fill: false,
				lineTension: 0,
				backgroundColor: "#fff",
				borderColor: "#6896f9",
				borderCapStyle: 'butt',
				borderDash: [],
				borderDashOffset: 0.0,
				borderJoinStyle: 'miter',
				pointBorderColor: "#fff",
				pointBackgroundColor: "#2a2f37",
				pointBorderWidth: 3,
				pointHoverRadius: 10,
				pointHoverBackgroundColor: "#FC2055",
				pointHoverBorderColor: "#fff",
				pointHoverBorderWidth: 3,
				pointRadius: 6,
				pointHitRadius: 10,
				data: [5, 32, 5, 42, 50, 59, 11],
				spanGaps: false
			}]
		};

		var myLineChart = new Chart(lineChart, {
			type: 'line',
			data: lineData,
			options: {
				legend: {
					display: false
				},
				scales: {
					xAxes: [{
						ticks: {
							fontSize: '11',
							fontColor: '#969da5'
						},
						gridLines: {
							color: 'rgba(0,0,0,0.05)',
							zeroLineColor: 'rgba(0,0,0,0.05)'
						}
					}],
					yAxes: [{
						display: false,
						ticks: {
							beginAtZero: true,
							max: 65
						}
					}]
				}
			}
		});
	}

	// Bar chart
	if ($('#bar-chart').length) {
		var barChart1 = $("#bar-chart");
		var barData1 = {
			labels: ["January", "February", "March", "April", "May", "June"],
			datasets: [{
				label: "Visitors",
				backgroundColor: "#5797FC",
				data: [32, 12, 20, 42, 20, 59]
			}]
		};

		new Chart(barChart1, {
			type: 'bar',
			data: barData1,
			options: {
				scales: {
					xAxes: [{
						display: false,
						ticks: {
							fontSize: '11',
							fontColor: '#969da5'
						},
						gridLines: {
							color: 'rgba(0,0,0,0.05)',
							zeroLineColor: 'rgba(0,0,0,0.05)'
						}
					}],
					yAxes: [{
						ticks: {
							beginAtZero: true
						},
						gridLines: {
							color: 'rgba(0,0,0,0.05)',
							zeroLineColor: '#6896f9'
						}
					}]
				},
				legend: {
					display: false
				},
				animation: {
					animateScale: true
				}
			}
		});
	}

	// Ckeditor
	if ($('#ckeditor').length) {
		CKEDITOR.replace('ckeditor')
	}

	// Datatable
	if ($('.datatable').length) {
		$('.datatable').DataTable()
	}

	// select2
	if ($('.select2').length) {
		$('.select2').select2()
	}

	// Date picker
	if ($('input.single-daterange').length) {
		$('input.single-daterange').daterangepicker({ "singleDatePicker": true })
	}

	if ($('input.multi-daterange').length) {
		$('input.multi-daterange').daterangepicker({ "startDate": "03/28/2017", "endDate": "04/06/2017" })
	}

	// Form validation
	if ($('#form-validate').length) {
		$('#form-validate').validator()
	}

	// Jquery count to
	$('.timer').each(function() {
		$(this).countTo({
			speed: 2000,
			formatter: function (value, options) {
				return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',')
			}
		})
	})

	// Animate css
	$('.card').each(function() {
		var i = $(this).find('i')	
		$(this).mouseover(function() {
			$(i).addClass('swing animated').css('animation-iteration-count', 'infinite')
		})

		$(this).mouseout(function() {
			$(i).removeClass('swing animated')
		})
	})

	// Form wizard
	if ($('.form-wizard-nav').length) {
		$('.form-wizard-nav').find('.step').each(function() {
			var next_step = $(this).next()
			var prev_step = $(this).prev()
			var content = $(this).attr('data-form')
			$(content).hide()

			$(content).find('.prev-action').on('click', function() {
				go(prev_step)
			})

			$(content).find('.next-action').on('click', function() {
				go(next_step)
			})
		})

		var content = $('.form-wizard-nav').find('.step').first()
		$($(content).attr('data-form')).show()
		$(content).addClass('active').addClass('complete')

		$('.form-wizard-nav').find('.step').each(function() {
			$(this).on('click', function() {
				go(this)
			})
		})
	}

	function go(el) {
		// next
		if ($(el).prev().hasClass('complete') && !$(el).hasClass('complete')) {
			$(el).prev().removeClass('active')
			$(el).addClass('complete').addClass('active')

			var prev_content = $(el).prev().attr('data-form')
			$(prev_content).hide()

			var next_content = $(el).attr('data-form')
			$(next_content).show()						
		}

		// prev
		if ($(el).hasClass('complete') && $(el).next().hasClass('active')) {
			$(el).addClass('complete').addClass('active')
			$(el).next().removeClass('complete').removeClass('active')

			var prev_content = $(el).next().attr('data-form')
			$(prev_content).hide()

			var next_content = $(el).attr('data-form')
			$(next_content).show()
		}
	}
})