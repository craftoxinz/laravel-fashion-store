import React from 'react';
import { Link } from '@inertiajs/react';
import styles from './Navbar.module.css';

interface NavbarProps {
    activePage?: string;
}

const Navbar: React.FC<NavbarProps> = ({ activePage }) => {
    return (
        <nav className={styles.navContainer}>
            <div className={styles.logoWrapper}>
                <Link href="/">
                    <img
                        src="/images/logo.svg"
                        alt="GALFINC Logo"
                        className={styles.logoImage}
                    />
                </Link>
            </div>

            <div className={styles.navLinks}>
                <Link
                    href="/"
                    className={activePage === 'home' ? styles.active : ''}
                >
                    Home
                </Link>
                <Link href="/product">Product</Link>
                <Link href="/convection">Convection</Link>
                <Link href="/contact" className={styles.ctaButton}>
                    Contact us
                </Link>
            </div>
        </nav>
    );
};

export default Navbar;
