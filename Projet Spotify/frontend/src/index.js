import Albums from './albums'
import App from './App'
import Artists from './artists'
import ReactDOM from 'react-dom'
import React from 'react'
import Tracks from './tracks'
import Genres from './genres'
import Genre_Albums from  './genre_albums'
import Select_Artists from './select_artists'

import {
  Routes, Route, BrowserRouter
} from "react-router-dom";

ReactDOM.render(
  <React.StrictMode>
    <BrowserRouter>
      <Routes>
        <Route path="/" element={<App />} />
        <Route path="/genre_albums/:genreId" element={<Genre_Albums />} />
        <Route path="/albums/" element={<Albums />} />
        <Route path="/artists/" element={<Artists />} />
        <Route path="/tracks/:albumId" element={<Tracks />} />
        <Route path="/genres/" element={<Genres />} />
        <Route path="/select_artists/" element={<Select_Artists />} />
      </Routes>
    </BrowserRouter>
  </React.StrictMode>,
  document.getElementById('root')
);