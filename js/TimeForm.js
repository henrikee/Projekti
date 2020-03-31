﻿var p = MindFusion.Scheduling;
var hoursList;

var TimeForm = function (calendar, item, type)
{
	p.BaseForm.call(this, calendar, item);

	this._id = "TimeForm";
	this._type = type;
	this.headerText = "Appointment";
	
}

TimeForm.prototype = Object.create(p.BaseForm.prototype);
TimeForm.prototype.constructor = TimeForm;

TimeForm.prototype.drawContent = function ()
{
	p.BaseForm.prototype.drawContent.call(this);

	var content = this.getContent();	
	
	var row = this.row();
	row.innerHTML = this.localInfo.subjectCaption;
	content.appendChild(row);
	
	// create a text-area for the item subject
	var textArea = this.createTextArea({ id: "subject", initValue: this.item.subject, events: { keydown: this._areaKeyDown} });
	textArea.element.style.width = "13rem";
	this.addControl(textArea);

	row = this.row();
	row.appendChild(textArea.element);
	content.appendChild(row);

	// create a drop-down list for start hours
	row = this.row();
	row.innerHTML = "Alkaa klo:";
	content.appendChild(row);

	var control = this.createDropDownList({ id: "start_time", items: this.getHourLabels(), initValue: this.getStartTimeIndex(), addEmptyValue: false });
	control.element.style.width = "13rem";
	this.addControl(control);

	row = this.row();
	row.appendChild(control.element);
	content.appendChild(row);

	// create a drop-down list for end time
	row = this.row();
	row.innerHTML = "Loppuu klo:";
	content.appendChild(row);

	var item = this.item;
	control = this.createDropDownList({ id: "end_time", items: hoursList, initValue: this.getEndTimeIndex(),  addEmptyValue: false});
	control.element.style.width = "13rem";
	this.addControl(control);

	row = this.row();
	row.style.margin = "0rem 0rem 2rem 0rem";
	row.appendChild(control.element);
	content.appendChild(row);
	
	return content;
};

// create an array of objects to fill the hours drop-down
TimeForm.prototype.getHourLabels = function ()
{
	hoursList = [];
	hoursList.push({ value: 0, text: "00:00" });
	hoursList.push({ value: 1, text: "00:30" });
	
	let index = 1;
	
	for(var i = 1; i < 12; i++)
	{
		hoursList.push({ value: index+1, text: i.toString() + ":00" });
	    hoursList.push({ value: index+2, text: i.toString() + ":30" });
		
		index += 2;
	}
	
	//add the first afternnon hours, edited from 12h to 24h 
	hoursList.push({ value: index + 1, text: "12:00" });
	hoursList.push({ value: index + 2, text: "12:30" });
	
	index += 2;
	
	for(i = 12; i < 24; i++)
	{
		hoursList.push({ value: index+1, text: i.toString() + ":00" });
	    hoursList.push({ value: index+2, text: i.toString() + ":30" });
		
		index += 2;
	}	
	
	return hoursList;
}

// get the index of the current item's rank to set the value of the Ranks drop-down
TimeForm.prototype.getStartTimeIndex = function ()
{
	if (this.item != null && this.item.startTime != null)
	{
		
		let index  = this.item.startTime.__getHours() * 2;
		if(this.item.startTime.__getMinutes() > 0)
			index++;
		return index;		
		
	}
	return -1;
}

TimeForm.prototype.getSubject = function()
{
		return this.item.subject;
}

// get the index of the current item's rank to set the value of the Ranks drop-down
TimeForm.prototype.getEndTimeIndex = function ()
{
	if (this.item != null && this.item.endTime != null)
	{
		let hours = this.item.endTime.__getHours();
		let minutes = this.item.endTime.__getMinutes();
		
		let index = hours * 2;
		
		if (minutes > 0)
			index += 1;
		
		return index;
		
	}
	return -1;
}

// override BaseForm's drawButtons method to create form buttons
TimeForm.prototype.drawButtons = function ()
{
	var thisObj = this;

	var btnSave = this.createButton({
		id: "btnSave",
		text: this.localInfo.saveButtonCaption,
		events: { "click": function click(e)
		{
			return thisObj.onSaveButtonClick(e);
		}
		}
	});

	var btnCancel = this.createButton({
		id: "btnCancel",
		text: this.localInfo.cancelButtonCaption,
		events: { click: function click(e)
		{
			return thisObj.onCancelButtonClick(e);
		}
		}
	});

	//delete
	var btnDelete = this.createButton({
		id: "btnDelete",
		text: this.localInfo.deleteButtonCaption,
		events: { "click": function click(e){
			return thisObj.onDeleteButtonClick(e);
		}}
	});

	var buttons = this.row();
	buttons.classList.add("mfp-buttons-row");
	buttons.appendChild(btnSave.element);
	buttons.appendChild(btnCancel.element);
	//delete
	buttons.appendChild(btnDelete.element);

	return buttons;
};

TimeForm.prototype.onSaveButtonClick = function (e)
{
	// update the item with the form data
	 // update the item with the form data
 var startIndex = +this.getControlValue("start_time");
 var startTime = this.item.startTime.date.clone().addHours(startIndex * 0.5);

 var endIndex = +this.getControlValue("end_time");
 var endTime = this.item.endTime.date.clone().addHours(endIndex * 0.5);

 // if end time is specified, decrease it by one day
 if (endIndex != 0 && this.item.endTime.hour == 0)
  endTime.addDays(-1);

 // check for inconsistent start/end time
 if (startTime.valueOf() > endTime.valueOf())
         endTime = startTime.clone().addHours(1);

 // apply changes 
 this.item.subject = this.getControlValue("subject"); 
 this.item.startTime = startTime;
 this.item.endTime = endTime;

 // if a new item is created, add it to the schedule.items collection
 if (this.type === "new")
  this.calendar.schedule.items.add(this.item);

 // close the form
 this.closeForm();

 // repaint the calendar
 this.calendar.repaint(true);
};

TimeForm.prototype.onCancelButtonClick = function (e)
{
	// close the form
	this.closeForm();
};


