import React, { Component } from 'react';
import FullCalendar from "@fullcalendar/react"
import daygridPlugin from "@fullcalendar/daygrid"
import interactionPlugin from "@fullcalendar/interaction"
import listPlugin from '@fullcalendar/list'
import $ from 'jquery';
import './App.scss'



//A base set up for fullcalendar, but is mostly a boiler plate until more data is added
class fullCalendar extends React.Component {
  render() {
    return ( 
      <div>

      <head></head>
        <div className="modal-footer">
          {/* Buttons for the add and delete button, was going to be based on the modal boot-strap, but the idea was scrapped. 
              Buttons do not lead to anywhere and are purely static for design */}
          <button type="button" className="btn btn-success" data-toggle="modal" data-target="#addEvent">Add event</button>
          <button type="button" className="btn btn-success" data-toggle="modal" data-target="#addEvent">Delete event</button>
        </div>
            {/*Instantiated the fullcalendar with static methods
              Plugins are used to give the graph a "view" according to the fullcalendar api */}
        <FullCalendar

          plugins={[daygridPlugin, interactionPlugin, listPlugin]}
          
          initialView="dayGridMonth"
          //Highlight days
          selectable={true}
          //give use to the default buttons and to traverse through the week
          headerToolbar={{
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,dayGridWeek,dayGridDay,listWeek'
          }}
          // Static events
          events={[
            { title: 'event 1', date: '2020-12-13' },
            { title: 'event 2', date: '2020-12-15' },
            { title: 'event 2', date: '2020-12-15' },
            { title: 'event 2', date: '2020-12-15' },
            { title: 'event 2', date: '2020-12-15' },
            { title: 'event 2', date: '2020-12-15' },
            { title: 'event 2', date: '2020-12-15' }
          ]}

        />

      </div>
    )



  }
}

export default fullCalendar;

