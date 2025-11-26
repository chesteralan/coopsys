import { useState } from "react";
import Radio from "../input/Radio";

type GenderInputProps = {
  className?: string;
};

const STATUS = ["Single", "Married", "Separated", "Widowed"];

export default function CivilStatus({ className = "" }: GenderInputProps) {
  const [selectedValue, setSelectedValue] = useState<string>(STATUS[0].toLowerCase());

  const handleRadioChange = (value: string) => {
    setSelectedValue(value);
  };

  return (
    <div className={`relative ${className}`}>
      <label
        htmlFor="civilStatus"
        className="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400"
      >
        Civil Status
      </label>
      <div className="flex flex-wrap items-center gap-8">
        {STATUS.map((item: string, index:number) => (
          <Radio
            id={`civil-status-${index}`}
            name="civilStatus"
            value={item.toLowerCase()}
            checked={selectedValue === item.toLowerCase()}
            onChange={handleRadioChange}
            label={item}
          />
        ))}
      </div>
    </div>
  );
}
