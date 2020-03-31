var p = MindFusion.Scheduling;

// create a new instance of the calendar 
var calendar = new p.Calendar(document.getElementById("calendar"));

calendar.currentView = p.CalendarView.SingleMonth;

calendar.theme = "light";

//add the start time prefix before each subject
calendar.itemSettings.titleFormat = "%s[hh:mm tt] %h";
calendar.selectionEnd.addEventListener(handleSelection);
calendar.headerClick.addEventListener(handleHeaderClick);

//visualize the calendar
calendar.render();

//back to monthview
function handleHeaderClick(sender, args){
	if (sender.currentView === p.CalendarView.Timetable){
		sender.date = sender.timetableSettings.dates.items()[0];
		sender.currentView = p.CalendarView.SingleMonth;
	}
}

//timetable
function handleSelection(sender, args){
	if (sender.currentView === p.CalendarView.SingleMonth){
		//cancel current bahaviour
		args.cancel = true;
		var start = args.startTime;
		var end = args.endTime;

		//select all dates from the timetable
		sender.timetableSettings.dates.clear();

		while(start < end){
			sender.timetableSettings.dates.add(start);
			start = p.DateTime.addDays(start, 1);
		}
		sender.currentView = p.CalendarView.Timetable;
	}
}

// disable this built-in forms for item creation and modification
calendar.useForms = false;

// handle the itemDoubleClick event to show the custom form for item editing
calendar.itemDoubleClick.addEventListener(handleItemDoubleClick);

// handle the selectionEnd event to show the custom form for item creation
calendar.selectionEnd.addEventListener(handleSelectionEnd);


function handleItemDoubleClick(sender, args)
{
	// create and show the custom form
	var form = new TimeForm(sender, args.item, "edit");
	form.showForm();
}

function handleSelectionEnd(sender, args)
{
	// create a new item with the start and end time of the selection
	var item = new p.Item();
	item.startTime = args.startTime;
	item.endTime = args.endTime;

	// create and show the custom form
	var form = new TimeForm(sender, item, "new");
	form.showForm();
}





