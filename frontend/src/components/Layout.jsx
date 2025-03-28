import React from "react";
import { Children } from "react";

const Layout = ({Children}) => {
    return(
        <div>
            {/* header */}
            <header className="header">
                <div className="container">
                    <div className="logo">
                        <a href=""><img src="" alt="" /></a>
                    </div>
                </div>
            </header>
            {/* main */}
            <main>{Children}</main>
            {/* Footer */}
            <footer>
                <p>Footer</p>
            </footer>
        </div>
    );
}