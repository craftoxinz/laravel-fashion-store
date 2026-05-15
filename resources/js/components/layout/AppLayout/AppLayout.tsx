import React, { PropsWithChildren } from 'react';
import Navbar from '../Navbar/Navbar';
import Footer from '../Footer/Footer';
import styles from './AppLayout.module.css';

interface LayoutProps {
    activePage?: string;
}

export default function AppLayout({
    children,
    activePage,
}: PropsWithChildren<LayoutProps>) {
    return (
        <div className={styles.layoutWrapper}>
            <Navbar activePage={activePage} />

            <main className={styles.mainContent}>{children}</main>

            <Footer />
        </div>
    );
}
