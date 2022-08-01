import Navbar from './Components/navbar';
import Header from './Components/header';
import Custom from './Components/custom';
import Details from './Components/details';
import Teams from './Components/teams';
import Footer from './Components/footer';

import './App.css';

export default function App() {
    return (
        <>
            <Navbar />
            <Header />
            <Custom />
            <Details />
            <Teams />
            <Footer />
        </>
    )
}