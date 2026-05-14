import React, { PropsWithChildren } from 'react';
import styles from './Section.module.css';

interface SectionProps {
    id?: string;
    className?: string;
    fullWidth?: boolean;
    dark?: boolean;
    noPadding?: boolean;
}

export default function Section({
    children,
    id,
    className = '',
    fullWidth = false,
    dark = false,
    noPadding = false,
}: PropsWithChildren<SectionProps>) {
    const sectionClasses = `
        ${styles.section} 
        ${dark ? styles.darkTheme : ''} 
        ${className}
    `.trim();

    return (
        <section id={id} className={sectionClasses}>
            <div className={fullWidth ? styles.fullWidth : styles.container}>
                {children}
            </div>
        </section>
    );
}
